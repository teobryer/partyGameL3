<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-primary col-12">
			<div class="card-header">
				<h1>Game Parameters</h1>
			</div>
			<div class="card-body container">
				<!-- Input Personne -->
				<?php echo validation_errors(); ?>
					<?php echo form_open('parameters/addGuest') ?>
						<div class="container row mx-auto mb-5">
							<div class="btn-group col-lg-2 col-xl-2 col-md-2 ml-auto btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-secondary active">
									<input type="radio" name="male" id="male" class="btn btn-secondary" checked>♂
								</label>
								<label class="btn btn-secondary">
									<input type="radio" name="female" id="female" class="btn btn-secondary">♀
								</label>
							</div>
							<div class="btn-group col-lg-6 col-xl-6 col-md-6" role="group">
								<input type="text" class="form-control" name="username" id="usernameInput"
									placeholder="username" required>
							</div>
							<div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
        <label class="form-check-label" for="autoSizingCheck">
          Alcohol ?
        </label>
      </div>
    </div>
							<div class="btn-group col-lg-2 col-xl-2 col-md-2 mr-auto" role="group">
								<button type="submit" class="btn btn-secondary">+</button>
							</div>
						</div>
				</form>
				<form>
				<div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Name</label>
      <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
    </div>
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
      </div>
    </div>
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
        <label class="form-check-label" for="autoSizingCheck">
          Remember me
        </label>
      </div>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </div>
  </div>
  </form>
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
							<a class='text-danger' href='".site_url()."parameters/deleteGuestAtAPersonne/".$key."'><span class='badge badge-danger'>&times;</span></a>
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
				<div class="container">
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
					<?php echo "Le selecteur ne marche plus wtf"; ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
