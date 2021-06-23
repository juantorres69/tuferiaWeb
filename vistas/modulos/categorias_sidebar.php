<?php 
    $categorias = ControladorProductos::ctrMostrarCategorias(null, null);
?>
<!-- CATEGORY LIST -->
<div class="widget">
    <h5 class="widget_title">Categorias</h5>
    <ul class="widget_categories">
        <?php 
            foreach($categorias as $categoria){
                echo '<li><a href="'.$url.$categoria['ruta'].'"><span class="categories_name">'.$categoria['categoria'].'</span></a></li>';
            }
        ?>
    </ul>
</div>