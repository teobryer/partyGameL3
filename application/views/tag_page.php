<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-info col-12">
			<div class="card-header">
				<h1>Tags</h1>
			</div>
			<h2>Tags Exlude</h2>
			<div class="card-body container row mx-auto overflow-auto">
				<!-- Items -->
				<?php 
				if (!empty($tagsExclude)){
					foreach ($tagsExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-danger'>".ucfirst($item)." <span class='badge badge-success'>+</span></span></h2>";
					};
				}
				?>
			</div>
			<h2>Tags Unknown</h2>
			<div class="card-body container row mx-auto overflow-auto">
				<!-- Items -->
				<?php 
					foreach ($allTags as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-secondary'><span class='badge badge-danger'>&times;</span> ".ucfirst($item['textTag'])." <span class='badge badge-success'>+</span></span></h2>";
					};
				?>
			</div>
			
		</div>
	</div>
</div>
</div>
