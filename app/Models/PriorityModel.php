<?php

namespace App\Models;

use CodeIgniter\Model;

class PriorityModel extends Model
{
    protected $table = 'priorities';
    protected $primaryKey = 'id';
    protected $allowedFields = ['priority_level', 'description', 'created_at'];
}