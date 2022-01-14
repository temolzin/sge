<!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
    
  <head>
  	<title>LOGIN SGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">
   
    <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="public/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="public/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="public/plugins/summernote/summernote-bs4.min.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="public/plugins/sweetalert2/sweetalert2.css">

	</head>
	<body>
	<section class="ftco-section" style="background:-webkit-gradient(linear, 0% 30%, 0% 100%, from(#EFF8F5), to(#0c92ac));">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/img4.jpeg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Inicio de Sesión</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div>
			      	</div>
							<form action="#" class="signin-form" id="formEnviarLogin" name="formEnviarLogin" role="document">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Usuario</label>
			      			<input type="text" id="username_usuario" name="username_usuario"  class="form-control" placeholder="Username" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Contraseña</label>
		              <input type="password" id="password_usuario"  name="password_usuario" class="form-control" placeholder="Password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Ingresar</button>
		            </div>
		           
		          </form>
		         
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>



   

<!-- jQuery -->
    <script src="public/plugins/jquery/jquery.min.js"></script>
          <!-- JQUERY VALIDATE -->
    <script src="public/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="public/plugins/jquery-ui/jquery-ui.min.js"></script>
  
    <script src="public/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- SWEETALERT2 -->
    <script src="public/plugins/sweetalert2/sweetalert2.js"></script>
        
         <!-- jQuery Knob Chart -->
    <script src="public/plugins/jquery-knob/jquery.knob.min.js"></script>
   
  
    <!-- Bootstrap 4 -->
    <script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    
    
   
    
    
    
    




<script>
	
  $(document).ready(function (){
		loginIngresar();

	});

	var loginIngresar = function () {
		$.validator.setDefaults({
			submitHandler: function () {
				var datos = $('#formEnviarLogin').serialize();
				$.ajax({
					type: "POST",
					url: "<?php echo constant('URL');?>usuario/login",
					data: datos,
					success: function (data) {
                
					if (data > 0) {
							Swal.fire(
								"¡Éxito!",
								"Bienvenido :D",
								"success"
								).then(function () {
									window.location = "<?php echo constant('URL');?>";
								})
                        
							} 
                              else
                        
                                {
								Swal.fire(
									"¡Error!",
									"Los datos son incorrectos o no existe ese usuario en la base. " ,
									"error" 
									).then(function () {
									window.location = "<?php echo constant('URL');?>usuario";
								})
							}
						},
					});
			}
		});
    
		 $('#formEnviarLogin').validate({
            rules: {
                username_usuario: {
                    required: true
                },
                password_usuario: {
                    required: true
                }
                },
            messages: {
                username_usuario: {
                    required: "Ingrese su usuario"
                },
                password_usuario: {
                    required: "Ingrese su contraseña"
               }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
}
    
   
	
	function show() {
		var p = document.getElementById('password_usuario');
		p.setAttribute('type', 'text');
	}

	function hide() {
		var p = document.getElementById('password_usuario');
		p.setAttribute('type', 'password');
	}

	var pwShown = 0;

	document.getElementById("eye").addEventListener("click", function () {
		if (pwShown == 0) {
			pwShown = 1;
			show();
		} else {
			pwShown = 0;
			hide();
		}
	}, false);
    

</script>




