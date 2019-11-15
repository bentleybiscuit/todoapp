<?php

namespace Charlotte\controllers;

use Slim\Views\PhpRenderer;
use Charlotte\models\ToDoModel;

class GetAllToDosController
{
    private $toDoModel;

    public function __construct($toDoModel)
    {
      $this->toDoModel = $toDoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $args['taskname'] = $this->toDoModel->getAllToDos();
        //deal with the response
    }

}