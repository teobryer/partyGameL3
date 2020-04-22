<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center <?php echo $CardColor; ?> col-12">
			<div class="card-header">
			<h4>Gage n°<?php echo $num?></h4>
			</div>
			
			
			<div class="card-body" onclick="window.location='<?php base_url() ?>game'">
			
				<h1 class="card-title"><?php echo "Pour " . $personne; ?></h1>
				<h2 class="card-text"><?php echo "Gage : ". ucfirst($gage); ?></h2>
				
			</div>
			
			
			<div class="card-footer">
				<h5><?php echo $tags?></h5>
			</div>
		</div>
	</div>
</div>
 <script >
<!--

//-->
</script>
