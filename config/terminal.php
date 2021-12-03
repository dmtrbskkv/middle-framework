<?php

return [
    'commands' => [
        'db' => 'php vendor/bin/doctrine',
        'db:migrate' => './vendor/bin/doctrine-migrations migrate',
        'migration:create' => './vendor/bin/doctrine-migrations generate',
        'models:validate' => 'php vendor/bin/doctrine orm:validate-schema ',
    ],
];