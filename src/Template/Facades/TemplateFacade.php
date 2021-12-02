<?php

namespace Source\Template\Facades;

/**
 * Facades for Template Engine
 */
interface TemplateFacade
{
    /**
     * Return template code
     *
     * @param string $file Template file
     * @param array  $data Template data
     *
     * @return string|null
     */
    public function view(string $file, array $data): ?string;

    /**
     * Append data to template. That like global array of data
     *
     * @param array $data
     *
     * @return mixed
     */
    public static function appendStaticData(array $data):void;

    /**
     * Get static data array
     *
     * @return array
     */
    public static function getStaticData(): array;
}