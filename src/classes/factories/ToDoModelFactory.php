<?php

namespace Charlotte\factories;

use Charlotte\models\ToDoModel;
use Psr\container\ContainerInterface;

class ToDoModelFactory
{
    public function __invoke($container)
    {
        $db = $container->get('dbConnection');
        return new ToDoModel($db);
    }
}
