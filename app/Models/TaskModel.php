<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'due_date', 'status', 'category_id', 'priority', 'created_at'];

    public function getTasks()
    {
        $tasks = $this->select('tasks.*, categories.name as category_name, priorities.description as priority_level')
            ->join('categories', 'categories.id = tasks.category_id', 'left')
            ->join('priorities', 'priorities.id = tasks.priority', 'left')
            ->findAll();

        $subtaskModel = new SubtaskModel();

        foreach ($tasks as &$task) {
            $task['subtasks'] = $subtaskModel->where('task_id', $task['id'])->findAll();
        }

        return $tasks;
    }

    public function getTaskById($id)
    {
        return $this->select('tasks.*, categories.name as category_name, priorities.description as priority_level')
            ->join('categories', 'categories.id = tasks.category_id', 'left')
            ->join('priorities', 'priorities.id = tasks.priority', 'left')
            ->where('tasks.id', $id)
            ->first();
    }
}
