// $(document).ready(function () {
//   // Inisialisasi DataTables
//   $("#taskTable").DataTable({
//     responsive: true,
//     paging: true,
//     searching: true,
//     ordering: true,
//     info: true,
//     language: {
//       search: "Cari:",
//       lengthMenu: "Tampilkan _MENU_ entri",
//       info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
//       paginate: {
//         first: "Pertama",
//         last: "Terakhir",
//         next: "Selanjutnya",
//         previous: "Sebelumnya",
//       },
//     },
//   });

//   // Form submit untuk menambahkan tugas
//   $("#taskForm").submit(function (event) {
//     event.preventDefault();
//     var formData = $(this).serialize();

//     $.post("/tasks/create", formData, function (response) {
//       Swal.fire({
//         title: "Sukses!",
//         text: "Tugas berhasil ditambahkan.",
//         icon: "success",
//         confirmButtonText: "OK",
//       }).then(() => {
//         location.reload();
//       });
//     }).fail(function () {
//       Swal.fire({
//         title: "Gagal!",
//         text: "Terjadi kesalahan, coba lagi.",
//         icon: "error",
//       });
//     });
//   });

//   // Konfirmasi sebelum menghapus tugas
//   $(".delete-task").click(function () {
//     var taskId = $(this).data("id");

//     Swal.fire({
//       title: "Apakah yakin?",
//       text: "Tugas akan dihapus!",
//       icon: "warning",
//       showCancelButton: true,
//       confirmButtonText: "Hapus",
//       cancelButtonText: "Batal",
//     }).then((result) => {
//       if (result.isConfirmed) {
//         window.location.href = "/tasks/delete/" + taskId;
//       }
//     });
//   });
// });
