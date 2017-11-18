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
        'cache' => [
            'status' => true
        ],
        'path' => [
            'config'   => __DIR__ . '/../../../config',
            'module'   => __DIR__ . '/../../../web/module',
            'template' => __DIR__ . '/../web/template/default/index.tpl',
            'cache'    => [
                'config' => __DIR__ . '/../../../cache/arhone/config/config.php'
            ]
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
        $this->setConfiguration($this->getConfiguration());

    }

    /**
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
    public function getConfiguration () {

        $data = $this->getCache($this->config['path']['cache']['config']);
        if (empty($data)) {

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

            $cache = '<?php' . PHP_EOL;
            $cache .= '$data = [\'builder\' => [], \'handler\' => []];' . PHP_EOL;
            foreach ($configFileList as $type => $list) {

                foreach ($list as $file) {

                    if (is_file($file)) {
                        $cache .= '$data[\'' . $type . '\'][] = function () {' . PHP_EOL . trim(
                            str_replace(
                                ['<?php', '?>', '__DIR__', '__FILE'],
                                ['', '', '\'' . dirname($file) . '\'', '\'' . $file . '\''],
                                file_get_contents($file))
                            ) . PHP_EOL . '};' . PHP_EOL;
                    }

                }

            }

            $this->setCache($this->config['path']['cache']['config'],$cache . PHP_EOL . 'return $data;');
            $data = $this->getCache($this->config['path']['cache']['config']);

        }

        return is_array($data) ? $data : [];

    }

    /**
     * Задаёт конфигурацию модулей
     *
     * @param array $data
     */
    public function setConfiguration (array $data) {

        if (isset($data['builder'])) {

            foreach ($data['builder'] as $instruction) {

                $this->Builder->instruction($instruction());

            }

        }

        if (isset($data['handler'])) {

            $container = (object)[
                'Builder'  => $this->Builder
            ];

            foreach ($data['handler'] as $config) {

                $config = $config();
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
     * Возвращает значение кэша
     *
     * @param string $path
     * @return array
     */
    public function getCache (string $path) : array {

        if (!$this->config['cache']['status']) {
            return [];
        }

        if (is_file($path)) {

            $data = include $path;

        }

        return $data ?? [];

    }

    /**
     * Записывает кэш в файл
     *
     * @param string $path
     * @param $data
     * @return bool
     */
    public function setCache (string $path, $data) : bool {

        if (!$this->config['cache']['status']) {
            return false;
        }

        $dir = dirname($path);

        if (!is_dir($dir)) {

            mkdir($dir, 0700, true);

        }

        return file_put_contents($path, $data, LOCK_EX) == true;

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