<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Party Game
		<?php if (isset($title))
			echo " - $title";
		?>
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="py-auto <?php if (isset($CardColor)) echo $CardColor; else echo "bg-secondary"; ?>" style="height:92vh">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsiveToggler"
			aria-controls="navbarResponsiveToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsiveToggler">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo site_url() ?>home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url() ?>game">Game</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url() ?>parameters">Parameters</a>
				</li>
			</ul>
			<?php 
				if ($this->session->has_userdata('email')){
					echo "<div class='dropdown' >";
					echo "<button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
					echo ucfirst($this->session->userdata('username'));
					echo "</button>
						<div class='dropdown-menu' aria-labelledby='dropdownMenuButton' style='right: 0; left: auto;'>
							<a class='dropdown-item text-primary' href='".site_url()."account' style='li a:hover{background-color: green;}'>Account</a>
							<a class='dropdown-item text-primary' href='".site_url()."account/disconnect'>Disconnect</a>
						</div></div>";
					} ?>
		</div>
	</nav>
