<?php

namespace Source\Template\Drivers;

/**
 * Common Template Engine Driver
 */
abstract class CommonDriver implements Driver
{
    /**
     * @var string Template file
     */
    private string $file;
    /**
     * @var array Template data
     */
    private array $data = [];


    /**
     * Set Template file
     *
     * @param string $file
     *
     * @return Driver
     */
    public function setFile(string $file): Driver
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Get Template File
     *
     * @return string
     */
    public function getFile(): ?string
    {
        return $this->file ?? null;
    }

    /**
     * Set Template Data
     *
     * @param array $data
     *
     * @return Driver
     */
    public function setData(array $data): Driver
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get Template Data
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}