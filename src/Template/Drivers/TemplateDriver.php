<?php

namespace Source\Template\Drivers;

interface TemplateDriver
{
    public function setFile(string $file);

    public function getFile();

    public function setData(array $data);

    public function getData();

    public function render(): string;
}