<?php

use Source\Routing\Facades\RouteCollectionFacade as RouteCollection;
use Source\Routing\Facades\RouteFacade as Route;

/** @var RouteCollection $routes */
$routes->group('front', [
    Route::GET('/', [App\Controllers\HomeController::class, 'home'])->setMiddlewares([]),
]);

$routes->group('dashboard', [
    Route::REDIRECT('/dashboard', '/dashboard/login'),
    Route::GET('/dashboard/login', [\App\Controllers\DashboardController::class, 'login'])->setMiddlewares([]),
]);