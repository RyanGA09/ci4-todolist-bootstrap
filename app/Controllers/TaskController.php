<?php

namespace App\Controllers;

use App\Models\{CategoryModel, TaskModel, SubtaskModel, PriorityModel};
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
        $tasks = $this->taskModel->getTasks();
        $categories = $this->categoryModel->findAll();
        $priorities = $this->priorityModel->findAll();

        return view('tasks/index', [
            'tasks' => $tasks,
            'categories' => $categories,
            'priorities' => $priorities
        ]);
    }

    public function show($id = null)
    {
        if ($id === null) {
            return $this->failNotFound('Task ID is required');
        }

        $task = $this->taskModel->getTaskById($id);
        if (!$task) {
            return $this->failNotFound('Task not found');
        }

        $task['subtasks'] = $this->subtaskModel->where('task_id', $id)->findAll();
        
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
            'priority'    => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getPost();
        if ($this->taskModel->insert($data)) {
            return $this->respondCreated(['message' => 'Task created successfully']);
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
            'priority'    => 'required|integer'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $data = $this->request->getRawInput();
        if ($this->taskModel->update($id, $data)) {
            return $this->respond(['message' => 'Task updated successfully']);
        }
        return $this->failValidationErrors($this->taskModel->errors());
    }

    public function delete($id = null)
    {
        if ($id === null) {
            return $this->failNotFound('Task ID is required');
        }

        if ($this->taskModel->delete($id)) {
            return $this->respondDeleted(['message' => 'Task deleted successfully']);
        }
        return $this->failNotFound('Task not found');
    }
}
