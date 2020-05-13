<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-warning col-12">
			<div class="card-header">
				<h1>Inventory</h1>
			</div>
			<div class="card-body container row mx-auto">
				<!-- Items -->
				<?php 
					foreach ($inventory as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-dark'>".ucfirst($item)."</span></h2>";
					};
				?>
			</div>
		</div>
	</div>
</div>
</div>
