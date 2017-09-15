<?php

use App\AppController;

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../resources/views',
));

$app->extend('twig', function ($twig, $app) {
    $twig->addFilter(new \Twig_Filter('hash', function ($string) {
        $hash = md5(file_get_contents(__DIR__ . $string));
        return $string . "?v=" . $hash;
    }));
    $twig->addFunction(new \Twig_Function('file_contents', function ($string) {
        return file_get_contents(__DIR__ . $string);
    }));
    return $twig;
});

$app->get('/', function () use ($app) {
    return (new AppController($app))->index();
});

$app->get('/api', function () use ($app) {
    return (new AppController($app))->api();
});

$app->run();
