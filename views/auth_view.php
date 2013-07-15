<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Logi sisse &middot; Testly</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<style type="text/css">
		body {
			padding-bottom: 40px;
			background-color: #f5f5f5;
		}

		.form-signin {
			max-width: 300px;
			padding: 19px 29px 29px;
			margin: 0 auto 20px;
			background-color: #fff;
			border: 1px solid #e5e5e5;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
			-moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
			box-shadow: 0 1px 2px rgba(0,0,0,.05);
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
			margin-bottom: 10px;
		}
		.form-signin input[type="text"],
		.form-signin input[type="password"] {
			font-size: 16px;
			height: auto;
			margin-bottom: 15px;
			padding: 7px 9px;
		}

	</style>
	<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="../assets/js/html5shiv.js"></script>
	<![endif]-->

	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../assets/ico/favicon.png">
</head>

<body>


	<div class="heading" style="background-color:#3b5999;color: white; width: 100%;">

	<div  style="padding: 2% 5% 5% 5%">

<div class="pull-right">
	<form method="post" class="form-inline">
		<input name="username" type="text" class="input-small"  placeholder="kasutajanimi">
		<input name="password" type="password" class="input-small"  placeholder="parool">
		<label class="checkbox">
			<input type="checkbox" value="remember-me"> Pea mind meeles
		</label>
		<button class="btn btn-large btn-primary" type="submit">Logi sisse</button>
	</form>
</div>
		<h1 class="pull-left">facebook</h1>
	</div>
		</div>
		<div class="container">
	<div class="pull-right">
		<h1>Liitu!</h1>
		<form method="post" class="form-signin"style="border: none" >
			<div class="control-group">
			<input name="firstname" type="text" class="input-small"  placeholder="eesnimi">
			<input name="lastname" type="text" class="input-medium"  placeholder="perekonnanimi">
			<input name="password" type="password" class="input-block-level" placeholder="salasõna">
			<h4>Sünnipäev</h4>
			<input type="date" name="bdaytime">
			<label class="radio">
				<input type="radio" value="male"> Mees<br>
				<input type="radio" value="female"> Naine
			</label>
				</div>
			<button class="btn btn-large btn-primary" type="submit">Liitu</button>
		</form>
	</div>
</div> <!-- /container -->
</body>
</html>