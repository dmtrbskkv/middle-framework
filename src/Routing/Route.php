<?php

namespace Source\Routing;


use Source\Request;

class Route
{
    private $path;
    private $callback;

    private function __construct($path, $callback, $method = 'GET')
    {
        $this->path = $path;
        $this->callback = $callback;
    }

    public static function GET($path, $callback)
    {
        return new self($path, $callback, 'GET');
    }

    public static function POST($path, $callback)
    {
        return new self($path, $callback, 'POST');
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getCallback()
    {
        return $this->callback;
    }


}