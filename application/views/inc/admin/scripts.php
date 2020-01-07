  <!-- jQuery -->
  <script src="<?php echo base_url() ?>/public/assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>/public/assets/js/jquery-ui.js"></script>
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
        plus();
      })

      $(document).on('click', '.btn-check', function(){
        client = $(this).val();

        infoclient = client.split('*');

        $('#idclient').val(infoclient[0]);
        $('#client').val(infoclient[1]);

        $('#modal-default').modal('hide');
      })

      $('#product').autocomplete({

        source:function (req, res) {

          $.ajax({
            url:   base_url + 'matenimiento/producto/getProduct',
            type: 'POST',
            dataType: 'json',
            data:{ value: req.term},
            success:function(data){
                res(data)
            }
          });

         },
        minLength: 2,
        select: function(event, ui) {
          data = ui.item.id +  '*' + ui.item.code +  '*' + ui.item.label +  '*' + ui.item.price +  '*' + ui.item.stock;
          $('#btn-add').val(data);
        },
      })

      $('#btn-add').on('click', function() {

        $data = $(this).val();

        if (data != '') {
          infoProduct = data.split('*');
          html =  "<tr>";
          html += "<td> <input type='hidden' name='idproduct[]' value='"+ infoProduct[0]  +"'>" + infoProduct[1] + "</td>";
          html += "<td> " + infoProduct[2] + " </td>";
          html += "<td> <input type='hidden' name='price[]' value='"+ infoProduct[3]  +"'>" + infoProduct[3] + " </td>";
          html += "<td> " + infoProduct[4] + " </td>";
          html += "<td> <input type='text' name='quantity[]' value='1' class='quantity'> </td>";
          html += "<td> <input type='hidden' name='import[]' value='"+ infoProduct[3]  +"'> <p>" + infoProduct[3] + " </p> </td>";
          html += "<td> <button type='button' class='btn btn-danger btn-remove-product'> <span class='far fa-trash-alt'> </span> </button> </td>";
          html +=  "</tr>";

          $('#tbsales tbody').append(html);

          plus();
          $('#btn-add').val(null);
          $('#product').val(null);
        }else{
          alert('Seleccione un producto...');
        }
      })

      $(document).on('click', '.btn-remove-product', function(){
        $(this).closest('tr').remove();
        plus();
      });

      $(document).on('keyup', '#tbsales input.quantity', function(){
        quantity = $(this).val();

        price = $(this).closest('tr').find('td:eq(2)').text();

        importTotal = quantity * price;

        $(this).closest('tr').find('td:eq(5)').children('p').text(importTotal);
        $(this).closest('tr').find('td:eq(5)').children('input').val(importTotal);

        plus();
      });

      $(document).on('click', '.btn-view-sale', function(){
        value_id = $(this).val();

        $.ajax({
          url: base_url + 'movimientos/ventas/view',
          type: 'POST',
          dataType: 'html',
          data:{id:value_id},
          success: function(data){
            $('#modal-default .modal-body').html(data);
          }
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

      $('#tbsales tbody tr').each(function(){
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
  </script>