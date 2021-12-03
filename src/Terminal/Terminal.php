<?php

namespace Source\Terminal;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Console\EntityManagerProvider;
use Source\Application\ConfigLoader;
use Source\Terminal\Exceptions\CommandNotFound;
use Source\Terminal\Exceptions\NotRunningInTheTerminal;

class Terminal
{
    private array $config = [];
    private static array $commands = [];

    public function __construct()
    {
        $config = ConfigLoader::getConfig(ConfigLoader::CONFIG_FILE_TERMINAL);

        $this->setConfig($config);
        $this->setCommands($config['commands']);
    }

    /**
     * @throws NotRunningInTheTerminal
     * @throws CommandNotFound
     */
    public function run()
    {
        global $argv;

        if (!isset($argv) || !$argv) {
            throw new NotRunningInTheTerminal();
        }

        $commands = $this->getCommands();
        $commandKey = $argv[1];
        array_shift($argv);
        array_shift($argv);
        if (isset($commands[$commandKey])) {
            echo shell_exec($commands[$commandKey] . ' ' . implode(' ', $argv));
        } else {
            throw new CommandNotFound();
        }
    }

    public function getCommands(): array
    {
        return self::$commands;
    }

    public function setCommands($commands): Terminal
    {
        self::$commands = $commands;
        return $this;
    }

    private function getConfig(): array
    {
        return $this->config;
    }

    private function setConfig($config): Terminal
    {
        $this->config = $config;
        return $this;
    }
}