<?php

namespace Source\Request;

trait RequestQuery
{
    private array $get = [];
    private array $post = [];
    private array $files = [];

    private function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
    }

    public function get($key, $default = null)
    {
        return $this->getValue($this->get, $key, $default);
    }

    public function post($key, $default = null)
    {
        return $this->getValue($this->post, $key, $default);
    }

    public function files($key, $default = null)
    {
        return $this->getValue($this->files, $key, $default);
    }

    public function input($key, $default = null)
    {
        if ($this->get($key, $default)) {
            return $this->get($key, $default);
        }

        if ($this->post($key, $default)) {
            return $this->post($key, $default);
        }

        return $default;
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