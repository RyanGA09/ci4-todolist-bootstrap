<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="container mt-5">
    <h2 class="text-center">To-Do List</h2>
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
                        <button class="btn btn-danger btn-sm delete-task" data-id="<?= $task['id'] ?>">Hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Tambah Tugas -->
<div class="modal fade" id="addTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="taskForm">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Deadline</label>
                        <input type="date" name="due_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="Belum Selesai">Belum Selesai</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category_id" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
