<?php

namespace Charlotte\models;
class ToDoModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addToDo($taskname)
    {
        $query = $this->db->prepare('INSERT INTO `todos` (`taskname`) VALUES (:taskname);');
        $query->bindParam(':taskname', $taskname);
        return $query->execute();
    }

    public function getAllToDos()

    {
        $query = $this->db->prepare('SELECT `id`, `taskname`, `completed`, `deleted` from `todos`;');
        $query->execute();
        $results = $query->fetchAll();
        return $results;
    }

    public function setToDoComplete($completed)
    {
        $query = $this->db->prepare('INSERT INTO `todos` (`completed`) VALUES (:completed);');
        $query->bindParam(':completed', $completed);
        return $query->execute();
    }

    public function UpdateToDos($id, $taskname, $completed, $deleted)
    {
        $query = $this->db->prepare('INSERT INTO `todos` (`id`, `taskname`, `completed`, `deleted`) VALUES
 (:id, :taskname, :completed, :deleted);');
        $query->bindParam(':id', $id);
        $query->bindParam(':taskname', $taskname);
        $query->bindParam(':completed', $completed);
        $query->bindParam(':deleted', $deleted);
        return $query->execute();
    }

}