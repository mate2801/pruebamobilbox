<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL');?>public/js/jquery-3.3.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <title>pruebaMobilbox</title>
</head>
<body>

   <?php include('views/templates/header.php')?>
    
   <br>
   <br>

   <table id="table_id" class="display" style="width: 50%;
	height: 300px; " class="class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Noticia</th>
            <th>Ordenar por fecha</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->query as  $fila) { ?>
        <tr>
            <td><div class="panel-body">
            <div class="media">
                <div class="media-left">
                <h4 class="media-heading">TItulo: <?php echo $fila['titulo']  ?></h4>
                    <a href="#">
                        <img name="imagen" id="imagen" style="width: 500px; height: 200px;"  src="<?php echo $fila['urlimg']  ?>" >
                    </a>
                   
                </div>
                <div class="media-body">
                <h4>Descripcion :<?php echo $fila['descripcion']  ?></h4>
                <div class="clearfix"></div>
                <div class="btn-group" role="group" id="BegeniButonlari">
                    
                </div>                 
               </div>
            </div>
        </div></td>
            <td><label for="">Fecha</label> <?php echo $fila['fecha']  ?> </td>
            <td><a href="<?php echo constant('URL');?>noticias/editarNoticia/<?php echo $fila['idNoticias'] ?>"  class="btn btn-danger">Editar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
</body>
</html>

