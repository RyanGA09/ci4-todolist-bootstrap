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

            $("#editTaskId").val(id);
            $("#editTaskTitle").val(title);
            $("#editTaskDescription").val(description);

            if (dueDate) {
                let formattedDate = new Date(dueDate).toISOString().slice(0, 16);
                $("#editTaskDueDate").val(formattedDate);
            }

            $("#editTaskStatus").val(status);

            // Pastikan kategori dan prioritas di-set
            $("#editTaskCategory").val(category).change();
            $("#editTaskPriority").val(priority).change();
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
</script>