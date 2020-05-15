<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-warning col-12">
			<div class="card-header">
				<h1>Inventory</h1>
			</div>
			<h2>Inventory Include</h2>
			<div class="card-body container row mx-auto">
				<!-- Items -->
				<?php 
					foreach ($inventory as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-success'><span class='badge badge-danger'>&times;</span> ".ucfirst($item)."</span></h2>";
					};
				?>
			</div>
			<h2>Inventory Exlude</h2>
			<div class="card-body container row mx-auto overflow-auto">
				<!-- Items -->
				<?php 
					foreach ($inventoryExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-danger'>".ucfirst($item['textItem'])." <span class='badge badge-success'>+</span></span></h2>";
					};
				?>
			</div>
			<h2>Inventory Unknown</h2>
			<div class="card-body container row mx-auto overflow-auto">
				<!-- Items -->
				<?php 
					foreach ($inventoryExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-secondary'><span class='badge badge-danger'>&times;</span> ".ucfirst($item['textItem'])." <span class='badge badge-success'>+</span></span></h2>";
					};
					print_r($allplayers);
				?>
			</div>
			
		</div>
	</div>
</div>
</div>
