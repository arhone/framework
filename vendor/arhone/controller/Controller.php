<?php declare(strict_types = 1);
namespace arhone\controller;
use arhone\builder\Builder;
use arhone\cache\Cache;
use arhone\trigger\Trigger;
use arhone\tpl\Tpl;

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
            'config'    => __DIR__ . '/../../../config',
            'extension' => __DIR__ . '/../../../extension',
            'library'   => __DIR__ . '/../../../library',
            'module'    => __DIR__ . '/../../../web/module',
            'template'  => __DIR__ . '/../../../web/template',
        ]
    ];

    /**
     * @var $Builder Builder
     * @var $Cache Cache
     * @var $Trigger Trigger
     * @var $Tpl Tpl
     */
    protected $Builder;
    protected $Cache;
    protected $Trigger;
    protected $Tpl;

    /**
     * Controller constructor.
     *
     * @param Builder $Builder
     * @param Cache $Cache
     * @param Trigger $Trigger
     * @param Tpl $Tpl
     * @param array $config
     */
    public function __construct (Builder $Builder, Cache $Cache, Trigger $Trigger,  Tpl $Tpl, array $config = []) {

        $this->Builder = $Builder;
        $this->Cache   = $Cache;
        $this->Trigger = $Trigger;
        $this->Tpl     = $Tpl;

        $this->config($config);
        $this->autoload();
        $this->makeModuleConfiguration();

    }

    /**
     * @param $request
     * @return string
     */
    public function run ($request) {

        $response = $this->Trigger->run($request);

        if ($response !== null) {
            echo $response;
        } elseif ($this->Tpl->hasBlock('CONTENT')) {
            echo $this->Tpl->get($this->config['directory']['template'] . DIRECTORY_SEPARATOR . 'default/index.tpl');
        } else {
            echo $this->Trigger->run('HTTP:GET:/404');
        }

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
                'Builder' => $this->Builder,
                'Tpl'     => $this->Tpl
            ];

            foreach ($data['handler'] as $config) {

                foreach ($config as $action => $item) {

                    foreach ($item as $instruction) {

                        $this->Trigger->add($action, function ($match, $data) use ($instruction, $container) {

                            if (isset($instruction['controller']) && isset($instruction['method'])) {

                                $Module = $container->Builder->make($instruction['controller']);

                                $data = $Module->{$instruction['method']}(...array_intersect_key($match, array_flip($instruction['argument'] ?? array_flip($match))));

                                if (isset($instruction['blog']) && is_string($data)) {

                                    $container->Tpl->block($instruction['blog'], $data);

                                } else {

                                    return $data;

                                }

                            }

                        });

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