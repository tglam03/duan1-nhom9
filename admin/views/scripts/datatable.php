<script src="<?= BASE_URL ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= BASE_URL ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script>
  // Call the dataTables jQuery plugin
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "lengthMenu": [2, 4, 6, 8, 10], // Số lượng bản ghi hiển thị trên mỗi trang
      "order": [] // Thiết lập mặc định không có sắp xếp
    });
  });
  $(document).ready(function() {
    $('#dataTable1').DataTable({
      "lengthMenu": [2, 4, 6, 8, 10], // Số lượng bản ghi hiển thị trên mỗi trang
      "order": [] // Thiết lập mặc định không có sắp xếp
    });
  });
</script>