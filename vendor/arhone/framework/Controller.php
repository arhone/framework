<?php declare(strict_types = 1);
namespace arhone\framework;
use arhone\builder\Builder;
use arhone\router\Router;
use arhone\tpl\Tpl;

/**
 * Внедрение зависимостей
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
            'module'    => __DIR__ . '/../../../web/module',
            'template'  => __DIR__ . '/../../../web/template',
        ]
    ];

    /**
     * @var $Builder Builder
     */
    protected $Builder;

    /**
     * @var $Router Router
     */
    protected $Router;

    /**
     * @var $Tpl Tpl
     */
    protected $Tpl;

    /**
     * Controller constructor.
     *
     * @param Builder $Builder
     * @param Router $Router
     * @param Tpl $Tpl
     */
    public function __construct (Builder $Builder, Router $Router,  Tpl $Tpl) {

        $this->Builder = $Builder;
        $this->Router  = $Router;
        $this->Tpl     = $Tpl;

    }

    /**
     * @param $rout
     * @return string
     */
    public function run ($rout) {

        $this->autoload();

        foreach (array_diff(scandir($this->config['directory']['module']), ['..', '.']) as $module) {

            if (is_dir($this->config['directory']['module'] . '/' . $module . '/config')) {

                foreach (array_diff(scandir($this->config['directory']['module'] . '/' . $module . '/config'), ['..', '.']) as $config) {

                    if ($config == 'builder.php') {
                        $this->Builder->instruction(include $this->config['directory']['module'] . '/' . $module . '/config/builder.php');
                    } elseif ($config == 'config.php') {
                        //$this->Config->add(include $this->config['directory']['module'] . '/' . $module . '/config/config.php');
                    } elseif ($config == 'handler.php') {
                        //$this->Handler->add(include $this->config['directory']['module'] . '/' . $module . '/config/handler.php');
                    } elseif ($config == 'router.php') {
                        $this->Router->routing(include $this->config['directory']['module'] . '/' . $module . '/config/router.php');
                    }

                }

            }

        }

        $Builder = $this->Builder;
        $Tpl = $this->Tpl;
        $this->Router->run($rout, function ($match, $instruction) use ($Builder, $Tpl) {

            if (isset($instruction['controller']) && isset($instruction['method'])) {

                $Module = $this->Builder->make($instruction['controller']);
                $data = $Module->{$instruction['method']}(...array_intersect_key($match, array_flip($instruction['argument'] ?? array_flip($match))));

                if (isset($instruction['blog']) && is_string($data)) {

                    $this->Tpl->variable($instruction['blog'], $data);

                } elseif (is_object($data)) {

                    echo 'response';

                } else {

                    echo 404;

                }

            }

        });

        $this->Tpl->display($this->config['directory']['template'] . DIRECTORY_SEPARATOR . 'default/index.tpl');

    }

    /**
     * Автозагрузка классов
     */
    protected function autoload () {

        spl_autoload_register(function ($className) {

            $directory[] = $this->config['directory']['extension'];
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

}