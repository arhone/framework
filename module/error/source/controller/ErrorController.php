<?php declare(strict_types=1);

namespace error\controller;

use arhone\http\Header;
use arhone\templating\templater\TemplaterInterface;

/**
 * Class ErrorController
 * @package error\controller
 * @author Алексей Арх <info@arh.one>
 */
class ErrorController {

    /**
     * @var $Templater \arhone\templating\templater\Templater
     */
    protected $Header;
    protected $Templater;

    /**
     * ErrorController constructor.
     * @param TemplaterInterface $Templater
     */
    public function __construct (TemplaterInterface $Templater) {

        $this->Templater = $Templater;

    }

    /**
     * @param string $type
     * @param $code
     * @return string
     * @throws \Exception
     */
    public function code ($type = 'get', $code = 0) {

        if (method_exists($this, 'code' . (int)$code)) {
            return $this->{'code' . (int)$code}();
        }

        return $this->code0($type);

    }

    /**
     * @param string $type
     * @return string
     * @throws \Exception
     */
    public function code404 ($type = 'get') {

        //$this->Header->add('HTTP/1.x 404 Not Found');
        //$this->Header->add('Status:', '404 Not Found');

        return $this->Templater->render(__DIR__ . '/../view/error.tpl', [
            'title'   => 'Страница не найдена',
            'message' => 'Страница не найдена :('
        ]);

    }

    /**
     * @return string
     * @throws \Exception
     */
    public function code0 () {

        return $this->Templater->render(__DIR__ . '/../view/error.tpl', [
            'title'   => 'Неизвестная ошибка',
            'message' => 'Ой :('
        ]);

    }

}
