  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/public/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/Jquery-print/jquery.print.js"></script>

  <!-- Highcharts -->
  <script src="<?php echo base_url() ?>/public/assets/js/highcharts/highcharts.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/highcharts/exporting.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/highcharts/export-data.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/highcharts/accessibility.js"></script>

  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url() ?>/public/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/jquery-ui.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>/public/assets/js/datatable/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/datatable/dataTables.bootstrap4.js"></script>

  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/buttons.flash.min.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/jszip.min.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/pdfmake.min.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/vfs_fonts.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/buttons.html5.min.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/dataTables-export/js/buttons.print.min.js"></script>


  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/public/assets/js/adminlte.min.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/datatable/demo.js"></script>
  <script>
    $(function() {

      var base_url = '<?php echo base_url(); ?>';

      graph();

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

      $('.btn-view-user').on('click', function() {
        var id = $(this).val();

        $.ajax({

          url: base_url + 'adminstrador/usuarios/view/' + id,
          type: 'POST',
          success: function(res) {
            $('#modal-default .modal-body').html(res);
          }
        })
      })

      $('#report_sales').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excelHtml5',
            title: 'Listado de Ventas',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5]
            }
          },

          {
            extend: 'pdfHtml5',
            title: 'Listado de Ventas',
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5]
            }
          }
        ],

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
        plus();
      })

      $(document).on('click', '.btn-check', function() {
        client = $(this).val();

        infoclient = client.split('*');

        $('#idclient').val(infoclient[0]);
        $('#client').val(infoclient[1]);

        $('#modal-default').modal('hide');
      })

      $('#product').autocomplete({

        source: function(req, res) {

          $.ajax({
            url: base_url + 'matenimiento/producto/getProduct',
            type: 'POST',
            dataType: 'json',
            data: {
              value: req.term
            },
            success: function(data) {
              res(data)
            }
          });

        },
        minLength: 2,
        select: function(event, ui) {
          data = ui.item.id + '*' + ui.item.code + '*' + ui.item.label + '*' + ui.item.price + '*' + ui.item.stock;
          $('#btn-add').val(data);
        },
      })

      $('#btn-add').on('click', function() {

        $data = $(this).val();

        if (data != '') {
          infoProduct = data.split('*');
          html = "<tr>";
          html += "<td> <input type='hidden' name='idproduct[]' value='" + infoProduct[0] + "'>" + infoProduct[1] + "</td>";
          html += "<td> " + infoProduct[2] + " </td>";
          html += "<td> <input type='hidden' name='price[]' value='" + infoProduct[3] + "'>" + infoProduct[3] + " </td>";
          html += "<td> " + infoProduct[4] + " </td>";
          html += "<td> <input type='text' name='quantity[]' value='1' class='quantity'> </td>";
          html += "<td> <input type='hidden' name='import[]' value='" + infoProduct[3] + "'> <p>" + infoProduct[3] + " </p> </td>";
          html += "<td> <button type='button' class='btn btn-danger btn-remove-product'> <span class='far fa-trash-alt'> </span> </button> </td>";
          html += "</tr>";

          $('#tbsales tbody').append(html);

          plus();
          $('#btn-add').val(null);
          $('#product').val(null);
        } else {
          alert('Seleccione un producto...');
        }
      })

      $(document).on('click', '.btn-remove-product', function() {
        $(this).closest('tr').remove();
        plus();
      });

      $(document).on('keyup', '#tbsales input.quantity', function() {
        quantity = $(this).val();

        price = $(this).closest('tr').find('td:eq(2)').text();

        importTotal = quantity * price;

        $(this).closest('tr').find('td:eq(5)').children('p').text(importTotal);
        $(this).closest('tr').find('td:eq(5)').children('input').val(importTotal);

        plus();
      });

      $(document).on('click', '.btn-view-sale', function() {
        value_id = $(this).val();

        $.ajax({
          url: base_url + 'movimientos/ventas/view',
          type: 'POST',
          dataType: 'html',
          data: {
            id: value_id
          },
          success: function(data) {
            $('#modal-default .modal-body').html(data);
          }
        });
      });

      $(document).on('click', '.btn-print', function() {
        $('#modal-default .modal-body').print({
          title: 'Comprobante de Venta'
        });
      });
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

    function plus() {
      subTotal = 0;

      $('#tbsales tbody tr').each(function() {
        subTotal += Number($(this).find('td:eq(5)').text());
      })

      $("input[name=subtotal]").val(subTotal.toFixed(3));

      percentage = $('#igv').val();

      igv = subTotal * (percentage / 100);

      $("input[name=igv]").val(igv.toFixed(3));

      discount = $('input[name=discount]').val();

      total = subTotal + igv - discount;

      $('input[name=total]').val(total.toFixed(3));
    }

    function graph() {
      Highcharts.chart('graph', {
          chart: {
            type: 'column'
          },
          title: {
            text: 'Monto acumulado por las ventas de los meses'
          },
          subtitle: {
            text: 'Año : 2020'
          },
          xAxis: {
            categories: [
              'Jan',
              'Feb',
              'Mar',
              'Apr',
              'May',
              'Jun',
              'Jul',
              'Aug',
              'Sep',
              'Oct',
              'Nov',
              'Dec'
            ],
            crosshair: true
          },
          yAxis: {
            min: 0,
            title: {
              text: 'Monto Acumulado (pesos)'
            }
          },
          tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
              '<td style="padding:0"><b>{point.y:.1f} pesos</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
          },
          plotOptions: {
            column: {
              pointPadding: 0.2,
              borderWidth: 0
            }
          },
          series: [{
            name: 'Meses',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
          }]
          });
      }
  </script>