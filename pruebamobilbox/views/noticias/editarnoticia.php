<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="<?php echo constant('URL')?>public/css/styloimgmensaje.css" rel="stylesheet" >
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL');?>public/js/jquery-3.3.1.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
    <title>pruebaMobilbox</title>
</head>
<body>

   <?php include('views/templates/header.php')?>

   <br>
   <br>
   <div class="container" >
    <div class="row">
		<div class="span7 offset5">
			<form class="form-center" id="editarNoticia" method="post" enctype="multipart/form-data">
			  <fieldset>
			    <div id="legend">
			      <legend class="">editar noticia </legend>
                </div>
                
                <input type="hidden" id="idNoticia" name="idNoticia" value="<?php echo $this->query2['idNoticias']; ?>">

                <div class="control-group">  
			      <label class="control-label"  for="titulo">Titulo</label>
			      <div class="controls">
			        <input value="<?php echo $this->query2['titulo']; ?>" type="text" id="titulo" name="titulo" placeholder="" class="input-xlarge">
			      </div>
                </div>

                <div class="control-group">  
			      <label class="control-label"  for="imagen">IMAGEN formatos (jpg, jpeg)</label>
			      <div class="controls">
                  <input type="file" name="imagen" id="imagen" class="form-control input-lg"   >
			      </div>
                </div>


			    <div class="control-group">
                  <label class="control-label"  >Descripcion</label>
			      <div class="controls">
                  <textarea id="descripcion" name="descripcion"><?php echo $this->query2['descripcion']; ?></textarea>
                <script>
                        CKEDITOR.replace( 'descripcion' );
                </script>
                  
                  </div>
                </div>



                <script>

                 
                </script>





                
			    <div class="control-group">
			      
			      <div class="controls">
              <button id="submit" type="button" class="btn btn-success">editar</button>

                  </div>                 
                  <div class="card-footer">
                    <img class="loading" id="loading" src="<?php echo constant('URL');?>public/img/loading.gif" alt=""> <span id="mensajes"> </span>
                </div>                  
			    </div>
			  </fieldset>
			</form>
		</div>
	</div>
</div>
<script src="https://cdn.ckeditor.com/[version.number]/[distribution]/ckeditor.js"></script>
<script>

$( function () {
    $('#submit').click( function () {
        
        var formData = new FormData($("#editarNoticia")[0]);
         var ruta = "<?php echo constant('URL')?>noticias/validarEditarNoticia";
         var descripcion = CKEDITOR.instances['descripcion'].getData();
         formData.append("descripcion", descripcion);
        $.ajax({
            url: ruta,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                $('#loading').show();
                $('#mensajes').html('procesando datos');
            },
            success:function (respuesta) {
                $('#loading').hide();
                if (respuesta == 1) {
                    $('#mensajes').html("Noticia editada con exito!");
                    
                }else{
                  $('#mensajes').html(respuesta);
                }
                  
   

            }
       
    })
})
}
)

</script>

</body>
</html>

