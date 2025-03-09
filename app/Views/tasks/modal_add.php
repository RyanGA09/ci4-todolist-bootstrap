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
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Deadline</label>
                        <input type="datetime-local" name="due_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Subtasks</label>
                        <div id="subtasks-container">
                            <div class="input-group mb-2">
                                <input type="text" name="subtasks[0][title]" class="form-control" placeholder="Subtask Title">
                                <button type="button" class="btn btn-danger" onclick="removeSubtask(this)">Hapus</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" onclick="addSubtask()">Tambah Subtask</button>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>