<p>
    <strong>
        Nombre : <?php echo $client->name;?>
    </strong>
</p>

<p>
    <strong>
        Telefono : <?php echo $client->phone;?>
    </strong>
</p>

<p>
    <strong>
        Direccion : <?php echo $client->address;?>
    </strong>
</p>

<p>
    <strong>
        Ruc : <?php echo $client->ruc;?>
    </strong>
</p>

<p>
    <strong>
        Tipo cliente : <?php echo $client->typeClient;?>
    </strong>
</p>

<p>
    <strong>
        Tipo Documento : <?php echo $client->typeDocument;?>
    </strong>
</p>

<p>
    <strong>
        Numero Documento : <?php echo $client->num_document;?>
    </strong>
</p>

<p>
    <strong>
        Estado : <?php if($client->state_id == 1) { echo 'Activo/a';}else{echo 'Inactivo';}?>
    </strong>
</p>