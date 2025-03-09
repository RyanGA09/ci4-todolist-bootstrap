<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'due_date', 'status', 'category_id', 'priority_id', 'created_at'];
}
