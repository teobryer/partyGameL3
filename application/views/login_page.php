<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-danger col-12">
			<div class="card-header">
				<h1>Login</h1>
			</div>
			<div class="card-body container text-center">
				<!-- Input Personne -->
				<div class="container text-center">
					<?php echo validation_errors(); ?>
					<?php echo form_open('account/login') ?>
					<div class="col-lg-12 col-xl-12 col-md-12 col-12 form-group">
						<label class="sr-only" for="emailInput">Email address</label>
						<span class="d-inline-block" tabindex="0" data-toggle="tooltip"
							title="Please fill this field with your email">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text">@</div>
								</div>
								<input type="email" name="email" class="form-control" id="emailInput"
									placeholder="example@email.com" required>
							</div>
						</span>
					</div>
					<div class="col-lg-12 col-xl-12 col-md-12 col-12 form-group">
						<label class="sr-only" for="password">Password</label>
						<span class="d-inline-block" tabindex="0" data-toggle="tooltip"
							title="Please fill this field with your password">
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<div class="input-group-text"><svg class="bi bi-lock" width="1em" height="1em"
											viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd"
												d="M11.5 8h-7a1 1 0 00-1 1v5a1 1 0 001 1h7a1 1 0 001-1V9a1 1 0 00-1-1zm-7-1a2 2 0 00-2 2v5a2 2 0 002 2h7a2 2 0 002-2V9a2 2 0 00-2-2h-7zm0-3a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z"
												clip-rule="evenodd" />
										</svg>
									</div>
								</div>
								<input type="password" name="password" class="form-control" id="password"
									placeholder="************" required>
							</div>
						</span>
					</div>

					<div class="btn-group col-lg-4 col-xl-4 col-md-6 col-12 mb-5" role="group">
						<input type="submit" class="btn btn-secondary" name="submit" value="Login" />
					</div>
					</form>
					<div class="container col-lg-4 col-xl-4 col-md-6 col-12">
						<h5 class ="">You must log in if you want to take advantage of the game settings</h5>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="text-center">
					<a href="<?php site_url() ?>register"><button type="button"
							class="btn btn-secondary col-lg-4 col-xl-4 col-md-6 col-10">Pas encore inscrit
							?</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
