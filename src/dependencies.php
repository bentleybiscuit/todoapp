<?php

use Charlotte\factories\DeleteToDoControllerFactory;
use Charlotte\factories\GetAllToDosControllerFactory;
use Charlotte\factories\SetToDoCompleteControllerFactory;
use Charlotte\factories\ToDoModelFactory;
use Charlotte\factories\AddToDoControllerFactory;
use Charlotte\factories\UpdateToDoByIdControllerFactory;
use Slim\App;

return function (App $app) {
    $container = $app->getContainer();

    // view renderer
    $container['renderer'] = function ($c) {
        $settings = $c->get('settings')['renderer'];
        return new \Slim\Views\PhpRenderer($settings['template_path']);
    };

    // monolog
    $container['logger'] = function ($c) {
        $settings = $c->get('settings')['logger'];
        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushProcessor(new \Monolog\Processor\UidProcessor());
        $logger->pushHandler(new \Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
        return $logger;
    };

    $container['dbConnection'] = function ($c) {
        $settings = $c->get('settings') ['db'];
        $db = new \PDO($settings['host'].$settings['dbName'], $settings['userName'], $settings['password']);
        $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
        return $db;
    };
    $container['ToDoModel'] = new ToDoModelFactory();

    $container['AddToDoController'] = new AddToDoControllerFactory();

    $container['GetAllToDosController'] = new GetAllToDosControllerFactory();

    $container['SetToDoCompleteController'] = new SetToDoCompleteControllerFactory();

    $container['UpdateToDoByIdController'] = new UpdateToDoByIdControllerFactory();

    $container['DeleteToDoControllerFactory'] = new DeleteToDoControllerFactory();

};
