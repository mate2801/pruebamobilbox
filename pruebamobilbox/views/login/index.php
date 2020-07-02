<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo constant('URL');?>public/js/jquery-3.3.1.min.js"></script>
    <link href="<?php echo constant('URL')?>public/css/styloimgmensaje.css" rel="stylesheet" >
    <title>pruebaMobilbox</title>
</head>
<body>
  

    <div class="container" >
    <div class="row">
		<div class="span7 offset5">
			<form class="form-center" id="login" action='' method="POST">
			  <fieldset>
			    <div id="legend">
			      <legend class="">Login pruebaMobilbox</legend>
			    </div>
			    <div class="control-group">
			      
			      <label class="control-label"  for="usuario">Usuario</label>
			      <div class="controls">
			        <input type="text" id="usuario" name="usuario" placeholder="" class="input-xlarge">
			      </div>
			    </div>
			    <div class="control-group">
			      
			      <label class="control-label" for="contrasena">contraseña</label>
			      <div class="controls">
			        <input type="password" id="contrasena" name="contrasena" placeholder="" class="input-xlarge">
			      </div>
			    </div>
			    <div class="control-group">
			      
			      <div class="controls">
              <button id="submit" type="button" class="btn btn-success">Iniciar</button>
              <a href="<?php echo constant('URL');?>registropersona" class="btn btn-info">Registrarse</a>
              
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

    <br>

   
</body>
</html>
<script>
</script>
<script>
$(function() {
        console.log(' funciona');
        $('#submit').click(function() {

            $.ajax({
                url: '<?php echo constant('URL')?>login/validarUsuario',
                type: 'POST',
                data: $("#login").serialize(),
                beforeSend: function() {
                    $('#loading').show();
                    $('#mensajes').html('procesando datos');
                },
                success: function(respuesta) {
                    $('#loading').hide();
                    if (respuesta == 1) {
                      location.href = "bienvenido";
                    } else {
                        $('#mensajes').html(respuesta);
                    }
                }
            })
        })
    }
)
</script>