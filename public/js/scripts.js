$(document).ready(function () {
  $("#taskForm").submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();

    $.post("/tasks/create", formData, function (response) {
      Swal.fire({
        title: "Sukses!",
        text: "Tugas berhasil ditambahkan.",
        icon: "success",
        confirmButtonText: "OK",
      }).then(() => {
        location.reload();
      });
    });
  });
});

function deleteTask(id) {
  Swal.fire({
    title: "Apakah yakin?",
    text: "Tugas akan dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Hapus",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "/tasks/delete/" + id;
    }
  });
}
