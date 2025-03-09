<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Edit Tugas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editTaskForm">
                    <input type="hidden" name="id" id="editTaskId">
                    
                    <div class="mb-3">
                        <label for="editTaskTitle" class="form-label">Judul</label>
                        <input type="text" name="title" id="editTaskTitle" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTaskDescription" class="form-label">Deskripsi</label>
                        <textarea name="description" id="editTaskDescription" class="form-control"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTaskCreatedAt" class="form-label">Dibuat pada</label>
                        <input type="text" id="editTaskCreatedAt" class="form-control" disabled>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTaskDueDate" class="form-label">Deadline</label>
                        <input type="date" name="due_date" id="editTaskDueDate" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTaskStatus" class="form-label">Status</label>
                        <select name="status" id="editTaskStatus" class="form-control">
                            <option value="Belum Selesai">Belum Selesai</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTaskCategory" class="form-label">Kategori</label>
                        <select name="category_id" id="editTaskCategory" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= esc($category['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="editTaskPriority" class="form-label">Prioritas</label>
                        <select name="priority" id="editTaskPriority" class="form-control">
                            <option value="1">Rendah</option>
                            <option value="2">Sedang</option>
                            <option value="3">Tinggi</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
</div>
