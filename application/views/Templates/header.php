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

<body class="<?php if (isset($CardColor)) echo $CardColor; else echo "bg-secondary"; ?>" style="height:92vh">
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
							<a class='dropdown-item text-primary' href='".site_url()."account'>
								<svg class='bi bi-person-fill' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
									<path fill-rule='evenodd' d='M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z' clip-rule='evenodd'/>
						  		</svg> Account</a>
							<a class='dropdown-item text-primary' href='".site_url()."account/inventory'>
							<svg class='bi bi-inbox-fill' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
								<path fill-rule='evenodd' d='M3.81 4.063A1.5 1.5 0 014.98 3.5h6.04a1.5 1.5 0 011.17.563l3.7 4.625a.5.5 0 01-.78.624l-3.7-4.624a.5.5 0 00-.39-.188H4.98a.5.5 0 00-.39.188L.89 9.312a.5.5 0 11-.78-.624l3.7-4.625z' clip-rule='evenodd'/>
								<path fill-rule='evenodd' d='M.125 8.67A.5.5 0 01.5 8.5h5A.5.5 0 016 9c0 .828.625 2 2 2s2-1.172 2-2a.5.5 0 01.5-.5h5a.5.5 0 01.496.562l-.39 3.124a1.5 1.5 0 01-1.489 1.314H1.883a1.5 1.5 0 01-1.489-1.314l-.39-3.124a.5.5 0 01.121-.393z' clip-rule='evenodd'/>
							</svg> Inventory</a>
							<a class='dropdown-item text-primary' href='".site_url()."account/disconnect'>
							<svg class='bi bi-box-arrow-left' width='1em' height='1em' viewBox='0 0 16 16' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
								<path fill-rule='evenodd' d='M4.354 11.354a.5.5 0 000-.708L1.707 8l2.647-2.646a.5.5 0 10-.708-.708l-3 3a.5.5 0 000 .708l3 3a.5.5 0 00.708 0z' clip-rule='evenodd'/>
								<path fill-rule='evenodd' d='M11.5 8a.5.5 0 00-.5-.5H2a.5.5 0 000 1h9a.5.5 0 00.5-.5z' clip-rule='evenodd'/>
								<path fill-rule='evenodd' d='M14 13.5a1.5 1.5 0 001.5-1.5V4A1.5 1.5 0 0014 2.5H7A1.5 1.5 0 005.5 4v1.5a.5.5 0 001 0V4a.5.5 0 01.5-.5h7a.5.5 0 01.5.5v8a.5.5 0 01-.5.5H7a.5.5 0 01-.5-.5v-1.5a.5.5 0 00-1 0V12A1.5 1.5 0 007 13.5h7z' clip-rule='evenodd'/>
							</svg> Disconnect</a>
						</div></div>";
					} ?>
		</div>
	</nav>
