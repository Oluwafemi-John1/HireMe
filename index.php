<?php
    require('Router.php');
    require('Auth.php');
    require('ArtisanAuth.php');

    $router = new Router;
    $auth = new Auth;

    $router->add('POST', '/auth/signup', [$auth, 'createCustomer']);
    $router->add('POST', '/auth/login', [$auth, 'loginCustomer']);

    $method = $_SERVER['REQUEST_METHOD'];
    $path = $_SERVER['REQUEST_URI'];
?>