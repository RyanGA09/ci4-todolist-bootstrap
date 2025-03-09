<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'due_date', 'status', 'category_id', 'created_at'];

    public function getTasks()
    {
        return $this->select('tasks.*, categories.name as category_name')
                    ->join('categories', 'categories.id = tasks.category_id', 'left')
                    ->orderBy('tasks.due_date', 'ASC')
                    ->findAll();
    }
}
