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
						echo "<h2 class='mr-2'><span class='badge badge-success'><span class='badge badge-danger'>&times;</span> ".ucfirst($item)."</span></h2>";
					};
				?>
			</div>
			<div class="card-body container row mx-auto">
				<!-- Items -->
				<?php 
					foreach ($inventoryExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-danger'>".ucfirst($item['textItem'])." <span class='badge badge-success'>+</span></span></h2>";
					};
				?>
			</div>
		</div>
	</div>
</div>
</div>
