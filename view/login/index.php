<!DOCTYPE html>
    <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
  	<title>LOGIN SGE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/loginstyle.css">
	
	</head>
	<body>
	<div class="brand">
	<a href="https://www.jamiecoulter.co.uk" target="_blank">
		<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/logo.png"/>
	</a>
	</div>
	<div class="login">
		<div class="login_title">
			<span>INGRESA TUS DATOS PARA ACCEDER AL SISTEMA</span>
		</div>
		<div class="login_fields">
			<div class="login_fields__user">
				<div class="icon">
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/user_icon_copy.png"/>
				</div>
				<input placeholder="Username" type="text">
					<div class="validation">
						<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png"/>
					</div>
				</input>
			</div>
			<div class="login_fields__password">
				<div class="icon">
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/lock_icon_copy.png"/>
				</div>
				<input placeholder="Password" type="password"></input>
				<div class="validation">
					<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/tick.png"/>
				</div>
			</div>
			<div class="login_fields__submit">
				<input type="submit" value="Log In"></input>
			</div>
		</div>
		<div class="success">
			<h2>Authentication Success</h2>
			<p>Welcome back</p>
		</div>
	</div>
	<div class="authent">
		<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/puff.svg"/>
		<p>Authenticating...</p>
	</div>
</body>

<script>
	$('input[type="submit"]').click(function(){
		$('.login').addClass('test')
		setTimeout(function(){
			$('.login').addClass('testtwo')
		},300);
		setTimeout(function(){
			$(".authent").show().animate({right:-320},{easing : 'easeOutQuint' ,duration: 600, queue: false });
			$(".authent").animate({opacity: 1},{duration: 200, queue: false }).addClass('visible');
		},500);
		setTimeout(function(){
			$(".authent").show().animate({right:90},{easing : 'easeOutQuint' ,duration: 600, queue: false });
			$(".authent").animate({opacity: 0},{duration: 200, queue: false }).addClass('visible');
			$('.login').removeClass('testtwo')
		},2500);
		setTimeout(function(){
			$('.login').removeClass('test')
			$('.login div').fadeOut(123);
		},2800);
		setTimeout(function(){
			$('.success').fadeIn();
		},3200);
	});

$('input[type="text"],input[type="password"]').focus(function(){
  $(this).prev().animate({'opacity':'1'},200)
});
$('input[type="text"],input[type="password"]').blur(function(){
  $(this).prev().animate({'opacity':'.5'},200)
});

$('input[type="text"],input[type="password"]').keyup(function(){
  if(!$(this).val() == ''){
    $(this).next().animate({'opacity':'1','right' : '30'},200)
  } else {
    $(this).next().animate({'opacity':'0','right' : '20'},200)
  }
});

var open = 0;
$('.tab').click(function(){
  $(this).fadeOut(200,function(){
    $(this).parent().animate({'left':'0'})
  });
});



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




