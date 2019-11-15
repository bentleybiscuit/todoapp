<?php

namespace Charlotte\controllers;

use Charlotte\models\ToDoModel;
use Slim\Views\PhpRenderer;

class SetToDoCompleteController
{
    private $toDoModel;

    public function __construct($toDoModel)
    {
        $this->toDoModel = $toDoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $completed = $request->getParam('completed');
        $id = $request->getParam('id');
        $result = $this->toDoModel->setToDos($completed, $id);
        if ($result) {
            return $response->withStatus(200)->withHeader('Location', '/');
        } else {
            return $response->withJson(["success" => "false", 200]);
        }
    }
}
