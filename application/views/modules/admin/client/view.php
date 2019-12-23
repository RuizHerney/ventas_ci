<p>
    <strong>
        Nombre : <?php echo $client->name;?>
    </strong>
</p>

<p>
    <strong>
        Apellidos : <?php echo $client->last_name;?>
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
        Empresa : <?php echo $client->business;?>
    </strong>
</p>

<p>
    <strong>
        Estado : <?php if($client->state_id == 1) { echo 'Activo/a';}else{echo 'Inactivo';}?>
    </strong>
</p>