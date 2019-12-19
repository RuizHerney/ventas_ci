  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/public/assets/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/public/assets/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/public/assets/js/adminlte.min.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/demo.min.js"></script>

  <script>
    $(function() {
      $("#example1").DataTable({
        "language": {
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "zeroRecords": "No se encontraron resultados en su busqueda",
          "searchPlaceholder": "Buscar registros",
          "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
          "infoEmpty": "No existen registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "search": "Buscar:",
          "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
          },
        }
      });
    });
  </script>