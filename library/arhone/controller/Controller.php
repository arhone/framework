<?php declare(strict_types = 1);
namespace arhone\controller;
use arhone\builder\BuilderInterface;
use arhone\cache\CacheInterface;
use arhone\trigger\TriggerInterface;

/**
 * Front Controller
 *
 * Class Controller
 * @package arhone\framework
 */
class Controller {

    /**
     * Конфигурация класса
     *
     * @var array
     */
    protected $config = [
        'path' => [
            'config' => __DIR__ . '/../../../config',
            'module' => __DIR__ . '/../../../web/module',
            'cache'  => 'arhone.config'
        ]
    ];

    /**
     * @var BuilderInterface $Builder
     * @var TriggerInterface $Trigger
     * @var CacheInterface $Cache
     */
    protected $Builder;
    protected $Trigger;
    protected $Cache;

    /**
     * Controller constructor.
     *
     * @param BuilderInterface $Builder
     * @param TriggerInterface $Trigger
     * @param CacheInterface $Cache
     * @param array $config
     */
    public function __construct (BuilderInterface $Builder, TriggerInterface $Trigger, CacheInterface $Cache,  array $config = []) {

        $this->Builder = $Builder;
        $this->Trigger = $Trigger;
        $this->Cache   = $Cache;

        $this->config($config);
        $this->prepare();

    }

    /**
     * Запускает событие
     *
     * @param $request
     * @return string
     */
    public function run ($request) {

        return $this->Trigger->run($request);

    }

    /**
     * Возвращает конфигурацию модулей
     *
     * @return array
     */
    public function getConfigurationList () {

        $configFileList = [
            'builder' => [
                $this->config['path']['config'] . '/builder.php'
            ],
            'handler' => [
                $this->config['path']['config'] . '/handler.php'
            ]
        ];

        foreach (array_diff(scandir($this->config['path']['module']), ['..', '.']) as $module) {

            foreach (['builder', 'handler'] as $type) {

                if (is_file($this->config['path']['module'] . '/' . $module . '/config/' . $type . '.php')) {
                    $configFileList[$type][] = $this->config['path']['module'] . '/' . $module . '/config/' . $type . '.php';
                }

            }

        }

        $data = [];
        foreach ($configFileList as $type => $list) {

            foreach ($list as $file) {

                if (is_file($file)) {

                    $data[$type][] = include $file;

                }

            }

        }

        return $data;

    }

    /**
     * Задаёт конфигурацию модулей
     */
    public function prepare () {

        if (!$data = $this->Cache->get($this->config['path']['cache'])) {

            $data = $this->getConfigurationList();
            $this->Cache->set($this->config['path']['cache'], $data);

        }

        if (isset($data['builder'])) {

            foreach ($data['builder'] as $instruction) {

                $this->Builder->instruction($instruction);

            }

        }

        if (isset($data['handler'])) {

            $container = (object)[
                'Builder'  => $this->Builder
            ];

            foreach ($data['handler'] as $config) {

                foreach ($config as $action => $item) {

                    foreach ($item as $instruction) {

                        if (isset($instruction['controller']) && isset($instruction['method'])) {

                            $this->Trigger->add($action, function ($match, $data) use ($instruction, $container) {

                                $Controller = $container->Builder->make($instruction['controller']);

                                $match[0] = $data;
                                return $Controller->{$instruction['method']}(...array_intersect_key($match, array_flip($instruction['argument'] ?? array_keys($match))));

                            }, [
                                'name'     => $instruction['name'] ?? null,
                                'position' => $instruction['position'] ?? null,
                                'break'    => $instruction['break'] ?? null
                            ]);

                        }

                    }

                }

            }

        }

    }

    /**
     * Задаёт конфигурацию
     *
     * @param array $config
     */
    public function config (array $config) {

        $this->config = array_merge($this->config, $config);

    }

}