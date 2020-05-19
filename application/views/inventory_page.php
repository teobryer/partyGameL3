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
					foreach ($inventoryIncludePersonne as $key => $item) {
						//enlève les tags déjà présents dans tagsExcludePersonne
						foreach ($allInventory as $key2 => $item2) {
							if ($item['idItem'] === $item2['idItem']){
								unset($allInventory[$key2]);
							}
						}
						echo "<h2 class='mr-2' id='".$item['idItem']."'>
								<span class='badge badge-success'>
									<span class='badge badge-danger' onclick='hideTagToExclude(\"".$item['idItem']."\", \"".ucfirst($item['textItem'])."\");'>&times;</span> "
									.ucfirst($item['textItem'])." 
									<span class='badge badge-secondary' onclick='hideTagToUnknown(\"".$item['idItem']."\", \"".ucfirst($item['textItem'])."\");'>?</span>
								</span>
							</h2>";
					};
				?>
			</div>
			<h2>Inventory Exlude</h2>
			<div class="card-body container row mx-auto overflow-auto" id="divTagExclude">
				<!-- Items -->
				<?php 
					foreach ($inventoryExcludePersonne as $key => $item) {
						//enlève les tags déjà présents dans tagsExcludePersonne
						foreach ($allInventory as $key2 => $item2) {
							if ($item['idItem'] === $item2['idItem']){
								unset($allInventory[$key2]);
							}
						}
						echo "<h2 class='mr-2' id='".$item['idItem']."'>
								<span class='badge badge-danger'>
									<span class='badge badge-secondary' onclick='hideTagToUnknown(\"".$item['idItem']."\", \"".ucfirst($item['textItem'])."\");'>?</span> "
									.ucfirst($item['textItem'])." 
									<span class='badge badge-success' onclick='hideTagToInclude(\"".$item['idItem']."\", \"".ucfirst($item['textItem'])."\");'>+</span>
								</span>
							</h2>";
					};
				?>
			</div>
			<h2>Inventory Unknown</h2>
			<div class="card-body container row mx-auto overflow-auto" id="divTagUnknown">
				<!-- Items -->
				<?php 
					foreach ($allInventory as $key => $item) {
						echo "<h2 class='mr-2' id='".$item['idItem']."'>
								<span class='badge badge-secondary'>
									<span class='badge badge-danger' onclick='hideTagToExclude(\"".$item['idItem']."\", \"".ucfirst($item['textItem'])."\");'>&times;</span> "
									.ucfirst($item['textItem'])." 
									<span class='badge badge-success' onclick='hideTagToInclude(\"".$item['idItem']."\", \"".ucfirst($item['textItem'])."\");'>+</span>
								</span>
							</h2>";
					};
				?>
			</div>
			<div class="card-footer">
				<button type="button" id="saveBtn" class="btn btn-success btn-lg mx-auto col-8" onclick='saveTags();' disabled>Save Changes</button>
			</div>
		</div>
	</div>
</div>
</div>

<script>
let inventoryExcludePersonneJS = <?php echo json_encode($inventoryExcludePersonne, JSON_FORCE_OBJECT); ?>;
inventoryExcludePersonneJS = Array.from(Object.values(inventoryExcludePersonneJS));
let inventoryIncludePersonneJS = <?php echo json_encode($inventoryIncludePersonne, JSON_FORCE_OBJECT); ?>;
inventoryIncludePersonneJS = Array.from(Object.values(inventoryIncludePersonneJS));
let siteUrlJS = <?php echo json_encode(site_url()); ?>;

function hideTagToInclude(tagnumber, tagtext) {
	document.getElementById("saveBtn").disabled = false;
  	document.getElementById(tagnumber).remove();
  	let node = document.createElement("h2");
	node.classList.add("mr-2"); 
	let container = document.createElement("span");
	container.classList.add("badge");
	container.classList.add("badge-success");
	let spanDelete = document.createElement("span");
	spanDelete.classList.add("badge");
	spanDelete.classList.add("badge-danger");
	spanDelete.classList.add("text-white");
	let spanUnknown = document.createElement("span");
	spanUnknown.classList.add("badge");
	spanUnknown.classList.add("badge-secondary");
	spanUnknown.classList.add("text-white");
	let UnknownCross = document.createTextNode("?");
	let deleteCross = document.createTextNode("×");
	let textnode = document.createTextNode(" "+tagtext+" "); 
	spanUnknown.appendChild(UnknownCross);  
	spanDelete.appendChild(deleteCross);
	container.appendChild(spanDelete);
	spanDelete.onclick = function() { hideTagToExclude(tagnumber, tagtext); };
	spanUnknown.onclick = function() { hideTagToUnknown(tagnumber, tagtext); };
	container.appendChild(textnode);
	container.appendChild(spanUnknown);
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagInclude").appendChild(node);
	let objet = { idTag: tagnumber, textTag: tagtext };
	//tagsExcludePersonneJS.push(objet);
}


function hideTagToExclude(tagnumber, tagtext) {
	document.getElementById("saveBtn").disabled = false;
  	document.getElementById(tagnumber).remove();
  	let node = document.createElement("h2");
	node.classList.add("mr-2"); 
	let container = document.createElement("span");
	container.classList.add("badge");
	container.classList.add("badge-danger");
	let spanUnknown = document.createElement("span");
	spanUnknown.classList.add("badge");
	spanUnknown.classList.add("badge-secondary");
	spanUnknown.classList.add("text-white");
	let addCross = document.createTextNode("+");
	let spanAdd = document.createElement("span");
	spanAdd.classList.add("badge");
	spanAdd.classList.add("badge-success");
	spanAdd.classList.add("text-white");
	let UnknownCross = document.createTextNode("?");
	let textnode = document.createTextNode(" "+tagtext+" ");   
	spanUnknown.appendChild(UnknownCross);
	spanAdd.appendChild(addCross);
	container.appendChild(spanUnknown);
	spanUnknown.onclick = function() { hideTagToUnknown(tagnumber, tagtext); };
	spanAdd.onclick = function() { hideTagToInclude(tagnumber, tagtext); };
	container.appendChild(textnode);
	container.appendChild(spanAdd);
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagExclude").appendChild(node);
	let objet = { idTag: tagnumber, textTag: tagtext };
	//tagsExcludePersonneJS.push(objet);
}

function hideTagToUnknown(tagnumber, tagtext) {
	document.getElementById("saveBtn").disabled = false;
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
	let spanDelete = document.createElement("span");
	spanDelete.classList.add("badge");
	spanDelete.classList.add("badge-danger");
	spanDelete.classList.add("text-white");
	let deleteCross = document.createTextNode("×");
	let addCross = document.createTextNode('+');
	let textnode = document.createTextNode(" "+tagtext+" ");   
	spanAdd.appendChild(addCross);
	spanDelete.appendChild(deleteCross);
	container.appendChild(spanDelete);
	container.appendChild(textnode);
	container.appendChild(spanAdd);
	spanDelete.onclick = function() { hideTagToExclude(tagnumber, tagtext); };
	spanAdd.onclick = function() { hideTagToInclude(tagnumber, tagtext); };
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagUnknown").appendChild(node);
	inventoryExcludePersonneJS.forEach(function (element, index) { if (tagnumber == element.idItem) { inventoryExcludePersonneJS.splice(index, 1); }} );
	inventoryIncludePersonneJS.forEach(function (element, index) { if (tagnumber == element.idItem) { inventoryExcludePersonneJS.splice(index, 1); }} );
}

function saveTags() {
  	document.getElementById("saveBtn").disabled = true;
	//console.log(tagsExcludePersonneJS);
	document.cookie="inventoryIncludePersonneJS="+JSON.stringify(inventoryIncludePersonneJS)+";expires=Wed, 18 Dec 2023 12:00:00 GMT";
	document.cookie="inventoryIncludePersonneJS="+JSON.stringify(inventoryExcludePersonneJS)+";expires=Wed, 18 Dec 2023 12:00:00 GMT";
	window.location.replace(siteUrlJS+"account/inventory");
}

</script>