<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-warning col-12">
			<div class="card-header">
				<h1>Inventory</h1>
			</div>
			<h2>Inventory Include</h2>
			<div class="card-body container row mx-auto" id="divTagInclude">
				<!-- Items -->
				<?php 
					foreach ($inventoryExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-success'><span class='badge badge-danger'>&times;</span> ".ucfirst($item['textItem'])." <span class='badge badge-secondary'>?</span></span></h2>";
					};
				?>
			</div>
			<h2>Inventory Exlude</h2>
			<div class="card-body container row mx-auto overflow-auto" id="divTagExclude">
				<!-- Items -->
				<?php 
					foreach ($inventoryExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-danger'><span class='badge badge-secondary'>?</span> ".ucfirst($item['textItem'])." <span class='badge badge-success'>+</span></span></h2>";
					};
				?>
			</div>
			<h2>Inventory Unknown</h2>
			<div class="card-body container row mx-auto overflow-auto" id="divTagUnknown">
				<!-- Items -->
				<?php 
					foreach ($inventoryExclude as $key => $item) {
						echo "<h2 class='mr-2'><span class='badge badge-secondary'><span class='badge badge-danger'>&times;</span> ".ucfirst($item['textItem'])." <span class='badge badge-success'>+</span></span></h2>";
					};
				?>
			</div>
			
		</div>
	</div>
</div>
</div>

<script>
function hideTagToInclude(tagnumber, tagtext) {
  	document.getElementById(tagnumber).remove();
  	let node = document.createElement("h2");
	node.classList.add("mr-2"); 
	let container = document.createElement("span");
	container.classList.add("badge");
	container.classList.add("badge-danger");
	let spanDelete = document.createElement("span");
	spanDelete.classList.add("badge");
	spanDelete.classList.add("badge-warning");
	spanDelete.classList.add("text-white");
	let deleteCross = document.createTextNode('X');
	let textnode = document.createTextNode(" "+tagtext);   
	spanDelete.appendChild(deleteCross);
	container.appendChild(spanDelete);
	spanDelete.onclick = function() { hideTagToUnknown(tagnumber, tagtext); };
	container.appendChild(textnode);
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagExclude").appendChild(node);
}


function hideTagToExclude(tagnumber, tagtext) {
  	document.getElementById(tagnumber).remove();
  	let node = document.createElement("h2");
	node.classList.add("mr-2"); 
	let container = document.createElement("span");
	container.classList.add("badge");
	container.classList.add("badge-danger");
	let spanDelete = document.createElement("span");
	spanDelete.classList.add("badge");
	spanDelete.classList.add("badge-warning");
	spanDelete.classList.add("text-white");
	let deleteCross = document.createTextNode('X');
	let textnode = document.createTextNode(" "+tagtext);   
	spanDelete.appendChild(deleteCross);
	container.appendChild(spanDelete);
	spanDelete.onclick = function() { hideTagToUnknown(tagnumber, tagtext); };
	container.appendChild(textnode);
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagExclude").appendChild(node);
}

function hideTagToUnknown(tagnumber, tagtext) {
  	document.getElementById(tagnumber).remove();
  	let node = document.createElement("h2");
	node.classList.add("mr-2"); 
	let container = document.createElement("span");
	container.classList.add("badge");
	container.classList.add("badge-secondary");
	let spanAdd = document.createElement("span");
	spanAdd.classList.add("badge");
	spanAdd.classList.add("badge-success");
	spanAdd.classList.add("text-white");
	let deleteCross = document.createTextNode('+');
	let textnode = document.createTextNode(tagtext+" ");   
	spanAdd.appendChild(deleteCross);
	container.appendChild(textnode);
	container.appendChild(spanAdd);
	spanAdd.onclick = function() { hideTagToExclude(tagnumber, tagtext); };
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagUnknown").appendChild(node);
}

</script>