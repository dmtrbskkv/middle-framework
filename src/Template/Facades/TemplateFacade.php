<?php

namespace Source\Template\Facades;

interface TemplateFacade
{
    public function view(string $file, array $data);

    public static function appendStaticData(array $data);

    public static function getStaticData(): array;
}