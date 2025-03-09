<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="text-center">Task List</h2>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTaskModal">Tambah Tugas</button>

<table id="taskTable" class="table table-striped">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Dibuat pada</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Kategori</th>
            <th>Prioritas</th>
            <th>Subtasks</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['description']) ?></td>
                <td><?= esc($task['created_at']) ?></td>
                <td><?= esc($task['due_date']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['category_name']) ?></td>
                <td><?= esc($task['priority_level']) ?> - <?= esc($task['priority_description']) ?></td>
                <td>
                    <ul>
                        <?php $subtasks = $subtaskModel->where('task_id', $task['id'])->findAll(); ?>
                        <?php foreach ($subtasks as $subtask): ?>
                            <li><?= esc($subtask['title']) ?> (<?= esc($subtask['status']) ?>)</li>
                        <?php endforeach; ?>
                    </ul>
                </td>
                <td>
                    <button type="button" 
                            class="btn btn-primary edit-task"
                            data-id="<?= $task['id']; ?>"
                            data-title="<?= $task['title']; ?>"
                            data-description="<?= $task['description']; ?>"
                            data-due_date="<?= $task['due_date']; ?>"
                            data-status="<?= $task['status']; ?>"
                            data-category_id="<?= $task['category_id']; ?>"
                            data-priority_id="<?= $task['priority_id']; ?>"
                            data-subtasks='<?= json_encode($task['subtasks']); ?>'>
                        Edit
                    </button>
                    <button class="btn btn-danger btn-sm delete-task" 
                        data-id="<?= $task['id'] ?>" 
                        data-bs-toggle="modal" data-bs-target="#deleteTaskModal">
                        Hapus
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<!-- Modal Tambah Tugas -->
<?= $this->include('tasks/modal_add') ?>

<!-- Modal Edit Tugas -->
<?= $this->include('tasks/modal_edit') ?>

<!-- Modal Hapus Tugas -->
<?= $this->include('tasks/modal_delete') ?>

<?= $this->endSection() ?>
