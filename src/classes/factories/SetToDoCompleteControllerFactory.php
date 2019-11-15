<?php

namespace Charlotte\factories;

use Charlotte\controllers\SetToDoCompleteController;
use Psr\Container\ContainerInterface;

class SetToDoCompleteControllerFactory
{
    public function __invoke(ContainerInterface $container) : SetToDoCompleteController
    {
        $toDoModel = $container->get('ToDoModel');

        return new SetToDoCompleteController($toDoModel);
    }
}
