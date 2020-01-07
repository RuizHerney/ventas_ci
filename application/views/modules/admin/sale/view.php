<div class="row">
	<div class="col-12 text-center">
		<b>Empresa de Ventas</b>
		<br>
		Calle Moquegua 430
		<br>
		Tel. 481890
		<br>
		Email:yonybrondy17@gmail.com
	</div>
</div>
<br>
<div class="row">

	<div class="col-6">
		<b>CLIENTE</b>
		<br>
		<b>Nombre:</b> <?php echo $sale->client ?>
		<br>
		<b>Nro Documento:</b> <?php echo $sale->document ?>
		<br>
		<b>Telefono:</b> <?php echo $sale->phone ?>
		<br>
		<b>Direccion</b> <?php echo $sale->address ?>
		<br>
	</div>

	<div class="col-6">
		<b>COMPROBANTE</b>
		<br>
		<b>Tipo de Comprobante:</b> <?php echo $sale->typeVoucher ?>
		<br>
		<b>Serie:</b> <?php echo $sale->serie ?>
		<br>
		<b>Nro de Comprobante:</b> <?php echo $sale->num_voucher ?>
		<br>
		<b>Fecha</b> <?php echo $sale->date ?>
	</div>
</div>
<br>
<div class="row">
	<div class="col-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($details as $detail) : ?>
					<tr>
						<td><?php echo $detail->code?></td>
						<td><?php echo $detail->name?></td>
						<td><?php echo $detail->price?></td>
						<td><?php echo $detail->quantity?></td>
						<td><?php echo $detail->import?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td>
						<?php echo $sale->sub_total ?>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IGV:</strong></td>
					<td>
						<?php echo $sale->igv ?>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td>
						<?php echo $sale->discount ?>
					</td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td>
						<?php echo $sale->total ?>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>