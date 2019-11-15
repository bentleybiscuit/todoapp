<?php


namespace Charlotte\factories;

use Charlotte\controllers\UpdateToDoByIdController;
use Psr\Container\ContainerInterface;

class UpdateToDoByIdControllerFactory
{
    public function __invoke(ContainerInterface $container) : UpdateToDoByIdController
    {
        $toDoModel = $container->get('ToDoModel');

        return new UpdateToDoByIdController($toDoModel);
    }
}