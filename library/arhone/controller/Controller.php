<?php declare(strict_types = 1);
namespace arhone\controller;
use arhone\builder\BuilderInterface;
use arhone\cache\CacheInterface;
use arhone\trigger\TriggerInterface;
use arhone\template\TemplateInterface;

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
     * @var TemplateInterface $Cache
     * @var TriggerInterface  $Trigger
     * @var TemplateInterface $Template
     */
    protected $Builder;
    protected $Cache;
    protected $Trigger;
    protected $Template;

    /**
     * Controller constructor.
     *
     * @param BuilderInterface  $Builder
     * @param CacheInterface    $Cache
     * @param TriggerInterface  $Trigger
     * @param TemplateInterface $Template
     * @param array $config
     */
    public function __construct (BuilderInterface $Builder, CacheInterface $Cache, TriggerInterface $Trigger,  TemplateInterface $Template, array $config = []) {

        $this->Builder  = $Builder;
        $this->Cache    = $Cache;
        $this->Trigger  = $Trigger;
        $this->Template = $Template;

        $this->config($config);
        $this->autoload();
        $this->makeModuleConfiguration();

    }

    /**
     * @param $request
     * @return string
     */
    public function run ($request) {

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
                'Builder'  => $this->Builder,
                'Template' => $this->Template
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
                                'break' => $instruction['break'] ?? false
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

        if (!$data = $this->Cache->get('arhone.framework.module.configuration')) {

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

            if (!empty($data)) {
                $this->Cache->set('arhone.framework.module.configuration', $data);
            }

        }

        return $data;

    }

    /**
     * Автозагрузка классов
     */
    protected function autoload () {

        spl_autoload_register(function ($className) {


            $directory[] = $this->config['directory']['extension'];
            $directory[] = $this->config['directory']['library'];
            $directory[] = $this->config['directory']['module'];
            foreach ($directory as $dir) {

                $file = $dir . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';

                if(is_file($file)) {

                    include_once $file;
                    break;

                }

            }

        });

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