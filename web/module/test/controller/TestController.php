<?php declare(strict_types=1);
namespace test\controller;

class TestController {

    public function middleware ($data) {

        return $data . 'Привет';

    }

}
