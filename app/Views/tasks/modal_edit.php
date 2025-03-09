<!-- Modal Edit Tugas -->
<div class="modal fade" id="editSubtaskList" tabindex="-1">
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
                        <label>Subtasks</label>
                        <div id="editSubtasksContainer"></div>
                        <button type="button" class="btn btn-secondary" onclick="addEditSubtask()">Tambah Subtask</button>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </form>
            </div>
        </div>
    </div>
</div>
