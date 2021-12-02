<?php

namespace Source\FileScanner;

/**
 * Interface for File Scanner Classes
 */
interface Scanner
{
    /**
     * Main method - scan directory(es)
     * @return mixed
     */
    public function scan();
}