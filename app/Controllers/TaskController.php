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
        
        $data = [
            'tasks' => $taskModel->getTasks(),
            'categories' => $categoryModel->findAll()
        ];

        return view('tasks/index', $data);
    }

    public function create()
    {
        $taskModel = new TaskModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'due_date'    => $this->request->getPost('due_date'),
            'status'      => $this->request->getPost('status'),
            'category_id' => $this->request->getPost('category_id'),
            'created_at'  => date('Y-m-d H:i:s')
        ];

        $taskModel->insert($data);

        return redirect()->to('/tasks')->with('success', 'Task berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $taskModel = new TaskModel();
        $task = $taskModel->find($id);

        if ($task) {
            $taskModel->delete($id);
            return redirect()->to('/tasks')->with('success', 'Task berhasil dihapus.');
        }

        return redirect()->to('/tasks')->with('error', 'Task tidak ditemukan.');
    }
}
