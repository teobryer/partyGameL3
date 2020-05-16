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
					
					<div class="col-lg-6 col-xl-6 col-md-6 col-9 mx-auto my-2 form-group">
						<label class="sr-only" for="username">Username</label>
						<span class="d-inline-block mx-auto col-lg-12 col-xl-12 col-md-12 col-12" tabindex="0"
							data-toggle="tooltip" title="Please fill this field with your username">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<svg class="bi bi-person" width="1em" height="1em" viewBox="0 0 16 16"
											fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd"
												d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z"
												clip-rule="evenodd" />
										</svg>
									</div>
								</div>
								<input type="input" name="username" class="form-control" id="username"
									placeholder="username" required>
							</div>
						</span>
					</div>
					<div class="col-lg-2 col-xl-2 col-md-2 col-3">
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
						echo " ".((array)$guest)['yearsOld']." years old</h3>
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
