<?php
namespace http_status\controller;
use arhone\header\Header;
use arhone\template\Template;

/**
 * Class HTTPStatusController
 * @package http_status\controller
 */
class HTTPStatusController {

    /**
     * @var $Header \arhone\header\Header
     * @var $Template \arhone\template\Template
     */
    protected $Header;
    protected $Template;

    /**
     * HTTPStatusController constructor.
     *
     * @param Template $Template
     */
    public function __construct (Header $Header,Template $Template) {

        $this->Header   = $Header;
        $this->Template = $Template;

    }

    /**
     * @param $type
     * @param $code
     * @return string
     */
    public function code ($type = 'get', $code) {

        if (method_exists($this, 'code' . (int)$code)) {
            return $this->{'code' . (int)$code}();
        }

        return $this->code0($type);

    }

    /**
     * @param string $type
     * @return mixed
     */
    public function code404 ($type = 'get') {

        $this->Header->add('HTTP/1.x 404 Not Found');
        $this->Header->add('Status:', '404 Not Found');

        return $this->Template->render(__DIR__ . '/../template/error.tpl', [
            'title'   => 'Страница не найдена',
            'message' => 'Страница не найдена :('
        ]);

    }

    /**
     * @return string
     */
    public function code0 ($type) {

        return $this->Template->render(__DIR__ . '/../template/error.tpl', [
            'title'   => 'Неизвестная ошибка',
            'message' => 'Ой :('
        ]);

    }

}