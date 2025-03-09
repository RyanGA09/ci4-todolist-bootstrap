<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>

    <!-- <?php if ($_ENV['CI_ENVIRONMENT'] === 'development') : ?>
        <link rel="stylesheet" href="http://localhost:3000/scss/style.scss">
    <?php else : ?>
        <link rel="stylesheet" href="/dist/style.css">
    <?php endif; ?> -->
    <link rel="stylesheet" href="../../../public/dist/css/styles.css">

    <!-- DataTables & CDN Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>
<body>
    <?= $this->renderSection('content'); ?>

    <!-- Load JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <?php if ($_ENV['CI_ENVIRONMENT'] === 'development') : ?>
        <script type="module" src="http://localhost:3000/@vite/client"></script>
        <script type="module" src="http://localhost:3000/js/tasks.js"></script>
    <?php else : ?>
        <script src="/dist/tasks.js"></script>
    <?php endif; ?> -->
    <script src="../../../public/dist/tasks.js"></script>
</body>
</html>

<script>
    // document.addEventListener("DOMContentLoaded", function () {
    //     const editTaskButtons = document.querySelectorAll(".edit-task");
    //     editTaskButtons.forEach(button => {
    //         button.addEventListener("click", function () {
    //             const id = this.getAttribute("data-id");
    //             const title = this.getAttribute("data-title");
    //             const description = this.getAttribute("data-description");
    //             const due_date = this.getAttribute("data-due_date");
    //             const status = this.getAttribute("data-status");

    //             // Mengisi form modal edit
    //             document.querySelector("#editTaskModal input[name='id']").value = id;
    //             document.querySelector("#editTaskModal input[name='title']").value = title;
    //             document.querySelector("#editTaskModal textarea[name='description']").value = description;
    //             document.querySelector("#editTaskModal input[name='due_date']").value = due_date;
    //             document.querySelector("#editTaskModal select[name='status']").value = status;
    //         });
    //     });
    // });
    $(document).ready(function() {
        $(".edit-task").on("click", function() {
            let id = $(this).data("id");
            let title = $(this).data("title");
            let description = $(this).data("description");
            let dueDate = $(this).data("due_date");
            let status = $(this).data("status");
            let category = $(this).data("category_id");
            let priority = $(this).data("priority_id");
            let subtasks = $(this).data("subtasks");

            $("#editTaskId").val(id);
            $("#editTaskTitle").val(title);
            $("#editTaskDescription").val(description);
            $("#editTaskDueDate").val(dueDate);
            $("#editTaskStatus").val(status);
            $("#editTaskCategory").val(category);
            $("#editTaskPriority").val(priority);

            // Kosongkan daftar subtasks terlebih dahulu
            $("#editSubtaskList").html("");

            // Tambahkan subtasks ke modal edit
            if (subtasks && subtasks.length > 0) {
                subtasks.forEach((subtask, index) => {
                    let subtaskHtml = `
                        <div class="mb-2">
                            <input type="text" name="subtasks[${index}][title]" class="form-control" value="${subtask.title}">
                            <select name="subtasks[${index}][status]" class="form-control">
                                <option value="Not Completed" ${subtask.status === 'Not Completed' ? 'selected' : ''}>Not Completed</option>
                                <option value="Completed" ${subtask.status === 'Completed' ? 'selected' : ''}>Completed</option>
                            </select>
                        </div>`;
                    $("#editSubtaskList").append(subtaskHtml);
                });
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        let deleteTaskModal = document.getElementById("deleteTaskModal");

        deleteTaskModal.addEventListener("show.bs.modal", function (event) {
            let button = event.relatedTarget;
            let taskId = button.getAttribute("data-id");

            let deleteForm = document.getElementById("deleteTaskForm");
            let deleteTaskId = document.getElementById("deleteTaskId");

            deleteTaskId.value = taskId;
            deleteForm.action = "/tasks/delete/" + taskId; 
        });
    });

    let subtaskIndex = 1;
    function addSubtask() {
        const container = document.getElementById("subtasks-container");
        const newSubtask = document.createElement("div");
        newSubtask.classList.add("input-group", "mb-2");
        newSubtask.innerHTML = `
            <input type="text" name="subtasks[${subtaskIndex}][title]" class="form-control" placeholder="Subtask Title">
            <button type="button" class="btn btn-danger" onclick="removeSubtask(this)">Hapus</button>
        `;
        container.appendChild(newSubtask);
        subtaskIndex++;
    }

    function addEditSubtask() {
        let index = $('#editSubtasksContainer .subtask-item').length;
        let newSubtaskHtml = `
            <div class="input-group mb-2 subtask-item">
                <input type="text" name="subtasks[${index}][title]" class="form-control" placeholder="Subtask baru" required>
                <select name="subtasks[${index}][status]" class="form-select">
                    <option value="Not Completed" selected>Not Completed</option>
                    <option value="Completed">Completed</option>
                </select>
                <button type="button" class="btn btn-danger" onclick="removeSubtask(this)">X</button>
            </div>
        `;
        $('#editSubtasksContainer').append(newSubtaskHtml);
    }

    function loadEditModal(taskId) {
        // Ambil data tugas dari server (gunakan AJAX)
        $.ajax({
            url: `/tasks/${taskId}`, // Endpoint untuk mendapatkan data task + subtasks
            type: 'GET',
            success: function(response) {
                $('#editTaskId').val(response.id);
                $('#editTaskTitle').val(response.title);
                $('#editTaskDescription').val(response.description);
                $('#editTaskDueDate').val(response.due_date);

                // Kosongkan container subtasks sebelum menambahkan yang baru
                $('#editSubtasksContainer').empty();

                // Tampilkan subtasks yang sudah ada
                response.subtasks.forEach((subtask, index) => {
                    let subtaskHtml = `
                        <div class="input-group mb-2 subtask-item">
                            <input type="text" name="subtasks[${index}][title]" class="form-control" value="${subtask.title}" required>
                            <select name="subtasks[${index}][status]" class="form-select">
                                <option value="Not Completed" ${subtask.status === 'Not Completed' ? 'selected' : ''}>Not Completed</option>
                                <option value="Completed" ${subtask.status === 'Completed' ? 'selected' : ''}>Completed</option>
                            </select>
                            <button type="button" class="btn btn-danger" onclick="removeSubtask(this)">X</button>
                        </div>
                    `;
                    $('#editSubtasksContainer').append(subtaskHtml);
                });

                // Tampilkan modal edit
                $('#editTaskModal').modal('show');
            },
            error: function() {
                alert('Gagal mengambil data tugas');
            }
        });
    }

    function removeSubtask(button) {
        button.parentElement.remove();
    }
</script>