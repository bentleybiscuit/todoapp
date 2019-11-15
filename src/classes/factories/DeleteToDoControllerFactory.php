<?php

namespace Charlotte\factories;

use Charlotte\controllers\DeleteToDoController;
use Psr\Container\ContainerInterface;

class DeleteToDoControllerFactory
{
    public function __invoke(ContainerInterface $container) : DeleteToDoController
    {
        $toDoModel = $container->get('ToDoModel');

        return new DeleteToDoController($toDoModel);
    }
}