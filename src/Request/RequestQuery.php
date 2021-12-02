<?php

namespace Source\Request;

/**
 * HTTP Request DATA from GET or POST query
 */
trait RequestQuery
{
    /**
     * @var array GET data
     */
    private array $get = [];
    /**
     * @var array POST data
     */
    private array $post = [];
    /**
     * @var array FILES from query
     */
    private array $files = [];

    /**
     * @var array Data from php://input
     */
    private $input;

    /**
     * Private constructor. Get instance via prepare() method
     */
    private function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->files = $_FILES;
        $this->input = json_decode(file_get_contents('php://input'))
            ? json_decode(file_get_contents('php://input'), true)
            : [];
    }

    /**
     * Get data from php://input array
     *
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    public function input(string $key, $default = null)
    {
        return $this->getValue($this->input, $key, $default);
    }

    /**
     * Get needed data from GET query
     *
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->getValue($this->get, $key, $default);
    }

    /**
     * Get needed data from POST query
     *
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    public function post(string $key, $default = null)
    {
        return $this->getValue($this->post, $key, $default);
    }

    /**
     * Get needed files from query
     *
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    public function files(string $key, $default = null)
    {
        return $this->getValue($this->files, $key, $default);
    }

    /**
     * Get data from POST or GET data
     *
     * @param string $key
     * @param null   $default
     *
     * @return mixed|null
     */
    public function query(string $key, $default = null)
    {
        if ($this->get($key, $default)) {
            return $this->get($key, $default);
        }

        if ($this->post($key, $default)) {
            return $this->post($key, $default);
        }

        return $default;
    }

    /**
     * Get Value from needed array by needed key
     *
     * @param array  $storage
     * @param string $key
     * @param null   $default
     *
     * @return mixed
     */
    private function getValue(array $storage, string $key, $default = null)
    {
        $value = $default;
        if (isset($storage[$key])) {
            $value = $storage[$key];
        }

        return $value;
    }
}