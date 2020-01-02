  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/public/assets/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/public/assets/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/public/assets/js/adminlte.min.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/demo.js"></script>

  <script>
    $(function() {

      var base_url = '<?php echo base_url(); ?>';

      $('.btn-view-category').on('click', function() {
        var id = $(this).val();

        $.ajax({

          url: base_url + 'matenimiento/categoria/view/' + id,
          type: 'POST',
          success: function(res) {
            $('#modal-default .modal-body').html(res);
          }
        })
      })

      $('.btn-view-client').on('click', function() {
        var id = $(this).val();

        $.ajax({

          url: base_url + 'matenimiento/cliente/view/' + id,
          type: 'POST',
          success: function(res) {
            $('#modal-default .modal-body').html(res);
          }
        })
      })

      $('.btn-view-product').on('click', function() {
        var id = $(this).val();

        $.ajax({

          url: base_url + 'matenimiento/producto/view/' + id,
          type: 'POST',
          success: function(res) {
            $('#modal-default .modal-body').html(res);
          }
        })
      })

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

      $('#voucher').on('change', function() {
        option = $(this).val();

        if (option != "") {

          infoVoucher = option.split('*');

          $('#idvoucher').val(infoVoucher[0]);
          $('#igv').val(infoVoucher[2]);
          $('#serie').val(infoVoucher[3]);
          $('#num').val(genereNum(infoVoucher[1]));
        } else {

          $('#idvoucher').val(null);
          $('#igv').val(null);
          $('#serie').val(null);
          $('#num').val(null);
        }
      })
    });

    function genereNum(num) {

      if (num >= 99999 && num < 999999) {
        return Number(num) + 1;
      }

      if (num >= 9999 && num < 99999) {
        return '0' + (Number(num) + 1);
      }

      if (num >= 999 && num < 9999) {
        return '00' + (Number(num) + 1);
      }

      if (num >= 99 && num < 999) {
        return '000' + (Number(num) + 1);
      }

      if (num >= 9 && num < 99) {
        return '0000' + (Number(num) + 1);
      }

      if (num < 9) {
        return '00000' + (Number(num) + 1);
      }
    }
  </script>