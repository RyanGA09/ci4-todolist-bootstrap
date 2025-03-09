<div class="modal fade" id="editTaskModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editTaskForm">
                    <input type="hidden" name="id" id="editTaskId">
                    <div class="mb-3">
                        <label>Judul</label>
                        <input type="text" name="title" id="editTaskTitle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="description" id="editTaskDescription" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Deadline</label>
                        <input type="datetime-local" name="due_date" id="editTaskDueDate" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" id="editTaskStatus" class="form-control">
                            <option value="Not Completed">Belum Selesai</option>
                            <option value="Completed">Selesai</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Kategori</label>
                        <select name="category_id" id="editTaskCategory" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label>Prioritas</label>
                        <select name="priority_id" id="editTaskPriority" class="form-control">
                            <?php foreach ($priorities as $priority): ?>
                                <option value="<?= $priority['id'] ?>">
                                    <?= esc($priority['priority_level']) ?> - <?= esc($priority['description']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>