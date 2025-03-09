<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\CategoryModel;
use CodeIgniter\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $taskModel = new TaskModel();
        $categoryModel = new CategoryModel();
        
        $data['tasks'] = $taskModel->getTasks();
        $data['categories'] = $categoryModel->findAll();
        
        return view('tasks/index', $data);
    }

    public function create()
    {
        $taskModel = new TaskModel();
        
        $taskModel->insert([
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'due_date'    => $this->request->getPost('due_date'),
            'status'      => $this->request->getPost('status'),
            'category_id' => $this->request->getPost('category_id')
        ]);

        return redirect()->to('/tasks');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        $taskModel->delete($id);

        return redirect()->to('/tasks');
    }
}
