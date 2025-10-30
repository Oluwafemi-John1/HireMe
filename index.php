<?php
    require('Router.php');
    require('Auth.php');
    require('ArtisanAuth.php');

    $router = new Router;
    $auth = new Auth;

    $router->add('POST', '/auth/signup', [$auth, 'createCustomer']);
    $router->add('POST', '/auth/login', [$auth, 'loginCustomer']);

    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $path = str_replace('/HireMe', '', $path);

    $router->dispatch($method, $path);
?>