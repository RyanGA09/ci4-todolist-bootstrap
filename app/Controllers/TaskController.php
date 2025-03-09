<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\TaskModel;
use App\Models\SubtaskModel;
use App\Models\PriorityModel;
use CodeIgniter\Controller;
use CodeIgniter\RESTful\ResourceController;

class TaskController extends ResourceController
{
    protected $taskModel;
    protected $categoryModel;
    protected $subtaskModel;
    protected $priorityModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->categoryModel = new CategoryModel();
        $this->subtaskModel = new SubtaskModel();
        $this->priorityModel = new PriorityModel();
    }

    public function index()
    {
        $tasks = $this->taskModel
            ->select('tasks.*, categories.name as category_name, priorities.priority_level as priority_level, priorities.description as priority_description')
            ->join('categories', 'categories.id = tasks.category_id', 'left')
            ->join('priorities', 'priorities.id = tasks.priority_id', 'left')
            ->findAll();

        foreach ($tasks as &$task) {
            $task['subtasks'] = $this->subtaskModel->where('task_id', $task['id'])->findAll();
        }

        $categories = $this->categoryModel->findAll();
        $priorities = $this->priorityModel->findAll();

        return view('tasks/index', [
            'tasks' => $tasks,
            'categories' => $categories,
            'priorities' => $priorities,
        ]);
    }

    public function show($id = null)
    {
        if ($id === null) {
            return $this->failNotFound('Task ID is required');
        }

        $task = $this->taskModel->select('tasks.*, categories.name as category_name, priorities.priority_level as priority_level')
            ->join('categories', 'categories.id = tasks.category_id', 'left')
            ->join('priorities', 'priorities.id = tasks.priority_id', 'left')
            ->where('tasks.id', $id)
            ->first();

        if (!$task) {
            return $this->failNotFound('Task not found');
        }

        // Ambil data subtasks
        $subtasks = $this->subtaskModel->where('task_id', $id)->findAll();
        
        // Jika tidak ada subtasks, kembalikan array kosong
        $task['subtasks'] = !empty($subtasks) ? $subtasks : [];

        return $this->respond($task);
    }

    public function create()
    {
        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'due_date'    => 'required|valid_date[Y-m-d H:i:s]',
            'status'      => 'required|in_list[Not Completed,Completed]',
            'category_id' => 'required|integer',
            'priority_id' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getPost();
        if ($taskId = $this->taskModel->insert($data)) {
            // Tambahkan subtasks jika ada
            if (!empty($data['subtasks'])) {
                foreach ($data['subtasks'] as $subtask) {
                    if (!empty($subtask['title'])) {
                        $this->subtaskModel->insert([
                            'task_id' => $taskId,
                            'title' => $subtask['title'],
                            'status' => 'Not Completed'
                        ]);
                    }
                }
            }
            return redirect()->to('/tasks')->with('success', 'Task created successfully');
        }
        return $this->failValidationErrors($this->taskModel->errors());
    }

    public function update($id = null)
    {
        if ($id === null) {
            return $this->failNotFound('Task ID is required');
        }

        $rules = [
            'title'       => 'required|min_length[3]',
            'description' => 'required',
            'due_date'    => 'required|valid_date[Y-m-d H:i:s]',
            'status'      => 'required|in_list[Not Completed,Completed]',
            'category_id' => 'required|integer',
            'priority_id' => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getRawInput();
        if ($this->taskModel->update($id, $data)) {
            // Hapus semua subtasks terkait dan tambahkan yang baru
            $this->subtaskModel->where('task_id', $id)->delete();
            if (!empty($data['subtasks'])) {
                foreach ($data['subtasks'] as $subtask) {
                    if (!empty($subtask['title'])) {
                        $this->subtaskModel->insert([
                            'task_id' => $id,
                            'title' => $subtask['title'],
                            'status' => $subtask['status'] ?? 'Not Completed'
                        ]);
                    }
                }
            }
            return redirect()->to('/tasks')->with('success', 'Task updated successfully');
        }
        return $this->failValidationErrors($this->taskModel->errors());
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return $this->failNotFound('Task ID is required');
        }

        $task = $this->taskModel->find($id);
        if (!$task) {
            return $this->failNotFound('Task not found');
        }

        if ($this->taskModel->delete($id)) {
            return redirect()->to('/tasks')->with('success', 'Task deleted successfully');
        }

        return $this->fail('Failed to delete task');
    }
}
