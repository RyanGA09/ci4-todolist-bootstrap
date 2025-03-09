<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="text-center">Task List</h2>
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTaskModal">Tambah Tugas</button>

<table id="taskTable" class="table table-striped">
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['description']) ?></td>
                <td><?= esc($task['due_date']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['category_name']) ?></td>
                <td>
                    <button class="btn btn-warning btn-sm edit-task" data-id="<?= $task['id'] ?>" data-bs-toggle="modal" data-bs-target="#editTaskModal">Edit</button>
                    <button class="btn btn-danger btn-sm delete-task" data-id="<?= $task['id'] ?>" data-bs-toggle="modal" data-bs-target="#deleteTaskModal">Hapus</button>
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
