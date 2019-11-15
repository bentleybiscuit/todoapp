<?php

namespace Charlotte\controllers;

use Slim\Views\PhpRenderer;
use Charlotte\models\ToDoModel;

class AddToDoController
{
    private $toDoModel;

    public function __construct(ToDoModel $toDoModel)
    {
        $this->toDoModel = $toDoModel;
    }

    public function __invoke($request, $response, $args)
    {
        $name = $request->getParam('taskname');
        $id = $request->getParam('id');
        $completed = $request->getParam('completed');
        $deleted = $request->getParam('deleted');

        $result = $this->toDoModel->addToDo($taskname, $id, $completed, $deleted);
        if($result){
            return $response->withStatus(200)->withHeader('Location', '/');
        } else {
            return $response->withJson(["success" => "false", 200]);
        }
    }
}