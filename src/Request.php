<?php

namespace Source;

class Request
{
    private $get;
    private $post;
    private $files;

    private function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
    }

    public static function prepare()
    {
        return new self();
    }

    public function get($key, $default = null)
    {
        return $this->getValue($this->get, $key, $default);
    }

    private function getValue($storage, $key, $default)
    {
        $value = $default;
        if (isset($storage[$key])) {
            $value = $storage[$key];
        }

        return $value;
    }

}