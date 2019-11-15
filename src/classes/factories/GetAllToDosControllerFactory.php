<?php

namespace Charlotte\factories;

use Charlotte\controllers\GetAllToDosController;
use Psr\Container\ContainerInterface;

class GetAllToDosControllerFactory
{
    public function __invoke(ContainerInterface $container) : GetAllToDosController
    {
        $toDoModel = $container->get('ToDoModel');
        return new GetAllToDosController($toDoModel);
    }
}