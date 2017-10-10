<?php declare(strict_types = 1);
namespace arhone\framework;
use arhone\builder\Builder;
use arhone\cache\Cache;
use arhone\trigger\Trigger;
use arhone\tpl\Tpl;

/**
 * Arhone Framework
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
            'extension' => __DIR__ . '/../../../web/extension',
            'library'   => __DIR__ . '/../../../web/library',
            'module'    => __DIR__ . '/../../../web/module',
            'template'  => __DIR__ . '/../../../web/template',
        ]
    ];

    /**
     * @var $Model Model
     * @var $Builder Builder
     * @var $Cache Cache
     * @var $Trigger Trigger
     * @var $Tpl Tpl
     */
    protected $Model;
    protected $Builder;
    protected $Cache;
    protected $Trigger;
    protected $Tpl;

    /**
     * Controller constructor.
     *
     * @param Model $Model
     * @param Builder $Builder
     * @param Cache $Cache
     * @param Trigger $Trigger
     * @param Tpl $Tpl
     * @param array $config
     */
    public function __construct (Model $Model, Builder $Builder, Cache $Cache, Trigger $Trigger,  Tpl $Tpl, array $config = []) {

        $this->Model   = $Model;
        $this->Builder = $Builder;
        $this->Cache   = $Cache;
        $this->Trigger = $Trigger;
        $this->Tpl     = $Tpl;

        $this->config($config);
        $this->autoload();

    }

    /**
     * @param $request
     * @return string
     */
    public function run ($request) {

        $container = (object)[
            'Builder' => $this->Builder,
            'Tpl'     => $this->Tpl
        ];

        if(!$data = $this->Cache->get('arhone.framework.config')) {

            $data = $this->searchConfigurationFiles();

        }

        if ($this->Tpl->hasBlock('CONTENT')) {
            $this->Tpl->display($this->config['directory']['template'] . DIRECTORY_SEPARATOR . 'default/index.tpl');
        } else {
            $this->Trigger->run('HTTP:GET:/404.html');
        }


    }

    /**
     *
     */
    protected function searchConfigurationFiles () {

        foreach (array_diff(scandir($this->config['directory']['module']), ['..', '.']) as $module) {

            if (is_dir($this->config['directory']['module'] . '/' . $module . '/config')) {

                foreach (array_diff(scandir($this->config['directory']['module'] . '/' . $module . '/config'), ['..', '.']) as $config) {

                    if ($config == 'builder.php') {
                        $this->Builder->instruction(include $this->config['directory']['module'] . '/' . $module . '/config/builder.php');
                    } elseif ($config == 'config.php') {
                        //$this->Config->add(include $this->config['directory']['module'] . '/' . $module . '/config/config.php');
                    } elseif ($config == 'handler.php') {

                        $handlerList = include $this->config['directory']['module'] . '/' . $module . '/config/handler.php';
                        foreach ($handlerList as $action => $instruction) {

                            $this->Trigger->add($action, function ($match, $data) use ($instruction, $container) {

                                if (isset($instruction['controller']) && isset($instruction['method'])) {

                                    $Module = $container->Builder->make($instruction['controller']);
                                    $data = $Module->{$instruction['method']}(...array_intersect_key($match, array_flip($instruction['argument'] ?? array_flip($match))));

                                    if (isset($instruction['blog']) && is_string($data)) {

                                        $container->Tpl->block($instruction['blog'], $data);

                                    } elseif (is_object($data)) {

                                        return 'response';

                                    }

                                }

                            });

                        }

                    }

                }

            }

        }

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