<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-success col-12">
			<div class="card-header">
				<h1>Account Settings</h1>
			</div>
			<div class="card-body container">
				<!-- Input Personne -->
				<h3 class="col-lg-12 col-xl-12 col-md-12">Add/Remove Guest from your Account</h3>
				<small class="col-lg-12 col-xl-12 col-md-12"><span class="badge badge-secondary">You have
					<?php echo $nbGuests?> guests</span></small>
					<?php echo validation_errors(); ?>
					<?php echo form_open('account/addGuest') ?>
					<div class="container form-row mx-auto align-items-center">
					<div class="btn-group col-lg-2 col-xl-2 col-md-2 mx-auto btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active">
							<input type="radio" name="male" id="male" class="btn btn-secondary" checked>♂
						</label>
						<label class="btn btn-secondary">
							<input type="radio" name="female" id="female" class="btn btn-secondary">♀
						</label>
					</div>
					<div class="btn-group col-lg-6 col-xl-6 col-md-6 mx-auto" role="group">
						<input type="text" class="form-control" name="username" id="usernameInput"
							placeholder="username" required>
					</div>
					<div class="col-auto">
						<div class="form-check mb-2 mx-auto">
							<input class="form-check-input" type="checkbox" id="alcohol" name="alcohol">
							<label class="form-check-label" for="autoSizingCheck">
								Alcohol ?
							</label>
						</div>
					</div>
					<div class="btn-group col-lg-2 col-xl-2 col-md-2 mx-auto" role="group">
						<button type="submit" class="btn btn-secondary">+</button>
					</div>
				</div>
				</form>
				<?php 
				if (isset($guests)){
					//<!-- Titles -->
					echo "<div class='container row col-12 mx-auto mb-2 mt-4'>
					<div class='col-lg-10 col-xl-10 col-md-10 col-sm-10 col-8'>
						<!-- Empty Layout Div -->
					</div>
					<p class='col-lg-2 col-xl-2 col-md-2 col-sm-2 col-4'>Alcohol</p>
					</div>";
					//<!-- Personnes -->
					foreach ($guests as $key => $guest) {
					echo "<div class='container row mx-auto mb-2'>
					<div class='btn-group col-lg-11 col-xl-11 col-md-11 col-sm-11 col-10 ml-auto' role='group'>
						<button type='button' class='close col-lg-2 col-xl-2 col-md-2 col-sm-2 col-4'
							aria-label='Close'>
							<a class='text-danger text-decoration-none' href='".site_url()."account/deleteGuestAtAPersonne/".$key."'><span class='badge badge-danger'>&times;</span></a>
						</button>
						<h3 class='btn-group col-lg-10 col-xl-10 col-md-10 col-sm-10 col-8 card-text align-text-bottom'
							role='group'>".((array)$guest)['username']." "; if (((array)$guest)['sex'] == "Male"){ echo "♂"; } else { echo "♀"; }; 
						echo "</h3>
					</div>
					<div class='btn-group col-lg-1 col-xl-1 col-md-1 col-sm-1 col-2 mr-auto' role='group'>
						<input class='form-check-input' type='checkbox' value='' id='AlcoolCheckbox' disabled "; if (((array)$guest)['alcoholFriendly'] == "True"){ echo "checked"; }; echo ">
					</div></div>";
					};
				}
				?>

			</div>
		</div>
	</div>
</div>
</div>
