<?php

namespace Source\Template\Drivers;

/**
 * Driver for Template Engine
 */
interface Driver
{
    /**
     * Set template file
     *
     * @param string $file
     *
     * @return mixed
     */
    public function setFile(string $file);

    /**
     * Get template file
     *
     * @return mixed
     */
    public function getFile();

    /**
     * Set Template Data
     *
     * @param array $data
     *
     * @return mixed
     */
    public function setData(array $data);

    /**
     * Get Template Data
     *
     * @return array
     */
    public function getData(): array;

    /**
     * Render current template file with current template data
     *
     * @return string
     */
    public function render(): string;
}