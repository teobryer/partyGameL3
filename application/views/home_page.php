<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Party Game</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="height:90vh" >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>




<div class="h-100 container-fluid">

<div class=" h-100 row align-middle">
    <div class="col my-auto" style="text-align:center">
    <a href='<?php base_url() ?>index.php/game/index'> 
    <svg width="310" height="310">
  <circle cx="155" cy="155" r="150" fill="blue" />
  <text x="50%" y="50%" text-anchor="middle" fill="white" font-size="25px" font-family="Arial" dy=".3em">Partie rapide</text>
Sorry, your browser does not support inline SVG.
</svg></a>
    </div>
    
    <div class="col my-auto" style="text-align:center">
     <svg width="310" height="310">
  <circle cx="155" cy="155" r="150" fill="red" onclick="alert('Partie perso')" />
  <text x="50%" y="50%" text-anchor="middle" fill="white" font-size="25px" font-family="Arial" dy=".3em">Partie personnalis&eacutee</text>
Sorry, your browser does not support inline SVG.
</svg>
    </div>
    
    <div class="col my-auto"  style="text-align:center">
    	<svg width="310" height="310">
  <circle cx="155" cy="155" r="150" fill="#aeaeae" onclick="alert('Partie � distance')" />
  <text x="50%" y="50%" text-anchor="middle" fill="white" font-size="25px" font-family="Arial" dy=".3em">Partie &agrave distance</text>
Sorry, your browser does not support inline SVG.
</svg>
		
    </div>
 </div>

</div>


</body>
<script>



</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>