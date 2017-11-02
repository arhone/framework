<?php declare(strict_types = 1);
namespace arhone\controller;
use arhone\builder\BuilderInterface;
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
        'directory' => [
            'module' => __DIR__ . '/../../../web/module',
        ]
    ];

    /**
     * @var BuilderInterface  $Builder
     * @var TriggerInterface  $Trigger
     */
    protected $Builder;
    protected $Trigger;

    /**
     * Controller constructor.
     *
     * @param BuilderInterface  $Builder
     * @param TriggerInterface  $Trigger
     * @param array $config
     */
    public function __construct (BuilderInterface $Builder, TriggerInterface $Trigger, array $config = []) {

        $this->Builder  = $Builder;
        $this->Trigger  = $Trigger;

        $this->config($config);
        $this->makeModuleConfiguration();

    }

    /**
     * @param $request
     * @return string
     */
    public function run ($request) {

        //print_r($this->Trigger->plan($request));
        return $this->Trigger->run($request);

    }

    /**
     * Применяет конфигурацию модулей
     *
     * @return array
     */
    public function makeModuleConfiguration () {

        $data = $this->getModuleConfiguration();

        if (isset($data['config'])) {

            foreach ($data['builder'] as $config) {

                //$this->Config->add($config);

            }

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
                                $data = $Controller->{$instruction['method']}(...array_intersect_key($match, array_flip($instruction['argument'] ?? array_keys($match))));

                                if (isset($instruction['block']) && is_string($data)) {

                                    $container->Template->block($instruction['block'], $data);

                                } else {

                                    return $data;

                                }

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
     * Возвращает конфигурацию модулей
     *
     * @return array
     */
    protected function getModuleConfiguration () : array {

        $configFileList = [
            'config'  => [
                $this->config['directory']['config'] . '/config.php'
            ],
            'builder' => [
                $this->config['directory']['config'] . '/builder.php'
            ],
            'handler' => [
                $this->config['directory']['config'] . '/handler.php'
            ]
        ];

        foreach (array_diff(scandir($this->config['directory']['module']), ['..', '.']) as $module) {

            foreach (['config', 'handler', 'builder'] as $type) {

                if (is_file($this->config['directory']['module'] . '/' . $module . '/config/' . $type . '.php')) {
                    $configFileList[$type][] = $this->config['directory']['module'] . '/' . $module . '/config/' . $type . '.php';
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
     * Задаёт конфигурацию
     *
     * @param array $config
     */
    public function config (array $config) {

        $this->config = array_merge($this->config, $config);

    }

}