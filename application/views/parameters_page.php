<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-primary col-12">
			<div class="card-header">
				<h1>Game Parameters</h1>
			</div>
			<div class="card-body container">
				<!-- Input Personne -->
				<div class="container row mx-auto mb-5">
					<div class="btn-group col-lg-2 col-xl-2 col-md-2 ml-auto" role="group">
						<button type="button" class="btn btn-secondary">♂</button>
						<button type="button" class="btn btn-secondary">♀</button>
					</div>
					<div class="btn-group col-lg-8 col-xl-8 col-md-8" role="group">
						<input type="text" class="form-control" id="usernameInput" placeholder="username">
					</div>
					<div class="btn-group col-lg-2 col-xl-2 col-md-2 mr-auto" role="group">
						<button type="button" class="btn btn-info">+</button>
					</div>
				</div>
				<!-- Titles -->
				<div class="container row col-12 mx-auto mb-2">
					<div class="col-lg-10 col-xl-10 col-md-10 col-sm-10 col-8">
						<!-- Empty Layout Div -->
					</div>
					<p class="col-lg-2 col-xl-2 col-md-2 col-sm-2 col-4">Alcool</p>
				</div>
				<!-- Personnes -->
				<?php 
					foreach ($guests as $key => $guest) {
					echo "<div class='container row mx-auto mb-2'>
					<div class='btn-group col-lg-11 col-xl-11 col-md-11 col-sm-11 col-10 ml-auto' role='group'>
						<button type='button' class='close col-lg-2 col-xl-2 col-md-2 col-sm-2 col-4'
							aria-label='Close'>
							<a class='text-danger' href='".site_url()."parameters/deleteGuestAtAPersonne/".$key."'><span aria-hidden='true'>&times;</span></a>
						</button>
						<h3 class='btn-group col-lg-10 col-xl-10 col-md-10 col-sm-10 col-8 card-text align-text-bottom'
							role='group'>".((array)$guest)['username']." "; if (((array)$guest)['sex'] == "Male"){ echo "♂"; } else { echo "♀"; }; 
						echo "</h3>
					</div>
					<div class='btn-group col-lg-1 col-xl-1 col-md-1 col-sm-1 col-2 mr-auto' role='group'>
						<input class='form-check-input' type='checkbox' value='' id='AlcoolCheckbox' "; if (((array)$guest)['alcoholFriendly'] == "True"){ echo "checked"; }; echo ">
					</div></div>";
					};
				?>
				<!-- Tags à Bannir -->
				<select class="selectpicker col-lg-12 col-xl-12 col-md-12 col-sm-12 col-12 mt-5" data-max-options="10"
				data-size="8" data-style="btn-secondary bg-secondary" data-selected-text-format="count > 6" data-live-search="true"
				data-live-search-placeholder="Rechercher un tag" data-live-search-style="startsWith" data-live-search-normalize="true"
				data-multiple-separator=" | " multiple title="Sélectionner des tags à bannir" data-none-results-text="Pas de résultat pour : {0}">
					<options>Sport</option>
					<option>Relou</option>
					<option>Débile</option>
					<option>Hot</option>
					<option>Sexe</option>
					<option>Dehors</option>
				</select>
			</div>
		</div>
	</div>
</div>
</div>
