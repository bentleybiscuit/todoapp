<?php

namespace Charlotte\controllers;

use Charlotte\models\ToDoModel;
use Slim\Views\PhpRenderer;

class DeleteToDoController
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
        $taskname = $request->getParam('taskname');
        $deleted = $request->getParam('deleted');


        $result = $this->toDoModel->deleteToDo($id, $taskname, $completed, $deleted);
        if ($result) {
            return $response->withStatus(200)->withHeader('Location', '/');
        } else {
            return $response->withJson(["success" => "false", 200]);
        }
    }

}