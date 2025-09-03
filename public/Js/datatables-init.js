$(document).ready(function () {
  $('#datatablesSimple').DataTable({
    dom: "<'row'<'col-sm-12'tr>>" +
         "<'row mt-3'<'col-sm-5'i><'col-sm-7'p>>",
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Cari siswa..."
    },
    initComplete: function () {
      // Pindahkan search box ke container di dalam card-header
      $('#dt-search-container').html($('.dataTables_filter'));
    }
  });
});