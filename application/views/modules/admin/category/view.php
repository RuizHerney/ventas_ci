<p>
    <strong>
        Nombre : <?php echo $category->name;?>
    </strong>
</p>

<p>
    <strong>
        Descripcion : <?php echo $category->description;?>
    </strong>
</p>

<p>
    <strong>
        Estado : <?php if($category->state_id == 1) { echo 'Activo/a';}else{echo 'Inactivo';}?>
    </strong>
</p>