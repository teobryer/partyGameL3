<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-danger col-12">
			<div class="card-header">
				<h1>Register</h1>
			</div>
			<div class="card-body container text-center">
				<!-- Input Personne -->
				<div class="container text-center form-group">
					<?php echo validation_errors(); ?>
					<?php echo form_open('account/register') ?>
						<div class="btn-group col-lg-5 col-xl-5 col-md-12 col-12 mb-3 row" role="group">
							<label class="col-lg-5 col-xl-5 col-md-12 col-12" for="username">Username :</label>
							<input type="input" name="username" class="form-control col-lg-7 col-xl-7 col-md-12 col-12" id="usernameInput" placeholder="example" required>
						</div>
						<div class="btn-group col-lg-5 col-xl-5 col-md-12 col-12 mb-3 row" role="group">
							<label class="col-lg-5 col-xl-5 col-md-12 col-12" for="yearsOld">Years old ? :</label>
							<input type="number" min="1" max="130" name="yearsOld" data-bind="value:replyNumber" class="form-control col-lg-7 col-xl-7 col-md-12 col-12" id="yearsOldInput" placeholder="18 years old" required>
						</div>
						<div class="btn-group col-lg-5 col-xl-5 col-md-12 col-12 mb-3 row" role="group">
							<label class="col-lg-5 col-xl-5 col-md-12 col-12" for="email">Email address :</label>
							<input type="email" name="email" class="form-control col-lg-7 col-xl-7 col-md-12 col-12" id="emailInput" placeholder="example@email.com" required>
						</div>
						<div class="btn-group col-lg-5 col-xl-5 col-md-12 col-12 mb-3 row" role="group">
							<label class="col-lg-5 col-xl-5 col-md-12 col-12" for="password">Password :</label>
							<input type="password" name="password" class="form-control col-lg-7 col-xl-7 col-md-12 col-12" id="passwordInput" placeholder="*****************" required>
						</div>
						<div class="btn-group col-lg-4 col-xl-4 col-md-6 col-12" role="group">
							<input type="submit" class="btn btn-secondary" name="submit" value="Register" />
						</div>
					</form>
				</div>
			</div>
			<div class="card-footer">
				<div class="text-center">
					<a href="<?php site_url() ?>login"><button type="button" class="btn btn-secondary col-lg-4 col-xl-4 col-md-6 col-10">Déjà inscrit ?</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
