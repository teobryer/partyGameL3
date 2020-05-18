<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-info col-12">
			<div class="card-header">
				<h1>Tags</h1>
			</div>
			<h2>Tags Exlude</h2>
			<div class="card-body container row mx-auto overflow-auto" id="divTagExclude">
				<!-- Items -->
				<?php 
				if (!empty($tagsExcludePersonne)){
					foreach ($tagsExcludePersonne as $key => $item) {
						//enlève les tags déjà présents dans tagsExcludePersonne
						/*foreach ($allTags as $key2 => $item2) {
							if ($item === $item2){
								unset($allTags[$key2]);
							}
						}*/
						echo "<h2 class='mr-2' id='Etag".$key."'>
								<span class='badge badge-danger'>
									<span class='badge badge-warning text-white' onclick='hideTagToUnknown(\"Etag".$key."\", \"".ucfirst($item['textTag'])."\");'>&times;</span> ".ucfirst($item['textTag'])."</span>
								</span>
							</h2>";
					};
				}
				?>
			</div>
			<h2>Tags Unknown</h2>
			<div class="card-body container row mx-auto overflow-auto" id="divTagUnknown">
				<!-- Items -->
				<?php 
					foreach ($allTags as $key => $item) {
						echo "<h2 class='mr-2' id='Utag".$key."'>
								<span class='badge badge-secondary'> ".ucfirst($item['textTag'])." 
									<span class='badge badge-success' onclick='hideTagToExclude(\"Utag".$key."\", \"".ucfirst($item['textTag'])."\");'>+</span>
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
let allTagsJS = <?php echo json_encode($allTags); ?>;
let tagsExcludePersonneJS = <?php echo json_encode($tagsExcludePersonne); ?>;

function hideTagToExclude(tagnumber, tagtext) {
	document.getElementById("saveBtn").disabled = false;
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
	let deleteCross = document.createTextNode("×");
	let textnode = document.createTextNode(" "+tagtext);   
	spanDelete.appendChild(deleteCross);
	container.appendChild(spanDelete);
	//tagnumber[0] = 'U';
	spanDelete.onclick = function() { hideTagToUnknown(tagnumber, tagtext); };
	container.appendChild(textnode);
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagExclude").appendChild(node);
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
	let deleteCross = document.createTextNode('+');
	let textnode = document.createTextNode(tagtext+" ");   
	spanAdd.appendChild(deleteCross);
	container.appendChild(textnode);
	container.appendChild(spanAdd);
	//tagnumber[0] = 'E';
	spanAdd.onclick = function() { hideTagToExclude(tagnumber, tagtext); };
	node.appendChild(container);
	node.id = tagnumber;
	document.getElementById("divTagUnknown").appendChild(node);
}

function saveTags() {
  	document.getElementById("saveBtn").disabled = true;
	console.log(tagsExcludePersonneJS);
	document.cookie="tagsExcludePersonneJS=John;expires=Wed, 18 Dec 2023 12:00:00 GMT"
	window.location.replace("http://localhost/account/tag");
}

</script>
