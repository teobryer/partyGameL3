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
					<div class="btn-group col-lg-2 col-xl-2 col-md-12 mx-auto btn-group-toggle" data-toggle="buttons">
						<label class="btn btn-secondary active">
							<input type="radio" name="male" id="male" class="btn btn-secondary" checked>♂
						</label>
						<label class="btn btn-secondary">
							<input type="radio" name="female" id="female" class="btn btn-secondary">♀
						</label>
					</div>
					<div class="col-lg-2 col-xl-2 col-md-12 col-12 mx-auto my-2">
						<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">YearsOld</label>
						<span class="d-inline-block col-lg-12 col-xl-12 col-md-12 col-12" tabindex="0"
							data-toggle="tooltip" title="Please fill this field with your years">
							<div class="input-group">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
											viewBox="0 0 24 24" fill="grey">
											<title>birthday-cake</title>
											<path
												d="M19.781 10.597h-5.156v-4.5h-1.688c0.499-0.661 0.8-1.496 0.8-2.401 0-0.006-0-0.011-0-0.017v0.001c0-1.296-0.613-2.513-1.6-3.177l-0.419-0.282-0.419 0.282c-0.987 0.664-1.6 1.881-1.6 3.177-0 0.005-0 0.010-0 0.016 0 0.905 0.3 1.74 0.807 2.411l-0.007-0.010h-1.874v4.5h-4.406c-1.501 0.002-2.717 1.218-2.719 2.719v8.434c0.001 0.828 0.672 1.499 1.5 1.5h18c0.828-0.001 1.499-0.672 1.5-1.5v-8.434c-0.002-1.501-1.218-2.717-2.719-2.719h-0zM11.718 2.135c0.328 0.407 0.519 0.959 0.519 1.545s-0.191 1.138-0.519 1.545c-0.328-0.407-0.519-0.959-0.519-1.545s0.191-1.138 0.519-1.545zM10.125 7.597h3v3h-3zM3 13.316c0.001-0.673 0.546-1.218 1.219-1.219h15.563c0.673 0.001 1.218 0.546 1.219 1.219v0l0 1.48-1.013 0.447c-0.185 0.083-0.401 0.132-0.628 0.132s-0.443-0.049-0.638-0.136l0.010 0.004-1.762-0.777-1.762 0.777c-0.185 0.083-0.401 0.132-0.628 0.132s-0.443-0.049-0.638-0.136l0.010 0.004-1.762-0.777-1.762 0.777c-0.185 0.084-0.401 0.132-0.628 0.132s-0.443-0.049-0.638-0.136l0.010 0.004-1.762-0.777-1.762 0.777c-0.185 0.084-0.401 0.132-0.628 0.132s-0.443-0.049-0.638-0.136l0.010 0.004-1.387-0.612zM21 21.75h-18v-5.48l0.782 0.345c0.363 0.164 0.787 0.259 1.234 0.259s0.871-0.096 1.253-0.267l-0.019 0.008 1.157-0.51 1.157 0.51c0.363 0.164 0.787 0.259 1.234 0.259s0.871-0.096 1.253-0.267l-0.019 0.008 1.157-0.51 1.157 0.51c0.363 0.164 0.787 0.259 1.234 0.259s0.871-0.096 1.253-0.267l-0.019 0.008 1.157-0.51 1.157 0.51c0.363 0.164 0.787 0.259 1.234 0.259s0.871-0.095 1.253-0.267l-0.019 0.008 0.408-0.18 0.001 5.315z">
											</path>
										</svg>
									</div>
								</div>
								<select class="custom-select form-control" name="yearsOld" id="yearsOld">
									<option value="1-9" selected>1-9 years old</option>
									<option value="10-13">10-13 years old</option>
									<option value="14-17">14-17 years old</option>
									<option value="18-21">18-21 years old</option>
									<option value="22-107">22-107 years old</option>
								</select>
							</div>
						</span>
					</div>
					<div class="col-lg-4 col-xl-4 col-md-12 col-12 mx-auto my-2 form-group">
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
					<div class="col-lg-2 col-xl-2 col-md-6 col-12">
						<div class="form-check mb-2 mx-auto">
							<input class="form-check-input" type="checkbox" id="alcohol" name="alcohol">
							<label class="form-check-label" for="autoSizingCheck">
								Alcohol ?
							</label>
						</div>
					</div>
					<div class="btn-group col-lg-2 col-xl-2 col-md-6 mx-auto" role="group">
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
					</div><ul class='list-group'>";
					//<!-- Personnes -->
					foreach ($guests as $key => $guest) {
					echo '<li class="list-group-item bg-success">';
					echo "<div class='row mb-2'>
					<div class='btn-group col-lg-11 col-xl-11 col-md-11 col-sm-11 col-10 ml-auto' role='group'>
						<button type='button' class='close col-lg-2 col-xl-2 col-md-2 col-sm-2 col-4'
							aria-label='Close'>
							<a class='text-danger text-decoration-none' href='".site_url()."account/deleteGuestAtAPersonne/".$key."'><span class='badge badge-danger'>&times;</span></a>
						</button>
						<h3 class='btn-group col-lg-9 col-xl-9 col-md-9 col-sm-9 col-6 card-text text-center'
							role='group' >".((array)$guest)['username']." "; if (((array)$guest)['sex'] == "Male"){ echo "♂"; } else { echo "♀"; }; 
						echo "</h3> <p class='col-lg-1 col-xl-1 col-md-1 col-sm-1 col-2'><span class='badge badge-info text-center'>".((array)$guest)['yearsOld']."yo</span></p>
					</div>
					<div class='btn-group col-lg-1 col-xl-1 col-md-1 col-sm-1 col-2 mr-auto' role='group'>
						<input class='form-check-input' type='checkbox' value='' id='AlcoolCheckbox' disabled "; if (((array)$guest)['alcoholFriendly'] == "True"){ echo "checked"; }; echo ">
					</div></div>";
					echo '</li>';
					};
					echo "</ul>";
				}
				?>

			</div>
		</div>
	</div>
</div>
</div>
