<?php

namespace Source\Template\Facades;

interface TemplateFacade
{
    public function view(string $file, array $data);
}