<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>Party Game - <?php echo $title ?>
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body class="bg-secondary" style="height:90vh">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php site_url() ?>home">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php site_url() ?>game">Game</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php site_url() ?>parameterds">Parameters</a>
				</li>
			</ul>
			<?php 
				if ($this->session->has_userdata('username'))
					echo "<a class='nav-link' href='";
					echo site_url();
					echo "account'>";
					echo ucfirst($this->session->userdata('username'));
					echo "</a>" ?>
		</div>
	</nav>