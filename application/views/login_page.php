<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-danger col-12">
			<div class="card-header">
				<h1>Login</h1>
			</div>
			<div class="card-body container text-center">
				<!-- Input Personne -->
				<div class="container text-center form-group">
					<?php echo validation_errors(); ?>
					<?php echo form_open('account/login') ?>
						<div class="btn-group col-lg-5 col-xl-5 col-md-12 col-12 mb-3 row" role="group">
							<label class="col-lg-5 col-xl-5 col-md-12 col-12" for="email">Email address :</label>
							<input type="email" name="email" class="form-control col-lg-7 col-xl-7 col-md-12 col-12" id="emailInput" placeholder="example@email.com">
						</div>
						<div class="btn-group col-lg-5 col-xl-5 col-md-12 col-12 mb-3 row" role="group">
							<label class="col-lg-5 col-xl-5 col-md-12 col-12" for="password">Password :</label>
							<input type="password" name="password" class="form-control col-lg-7 col-xl-7 col-md-12 col-12" id="passwordInput" placeholder="*****************">
						</div>
						<div class="btn-group col-lg-4 col-xl-4 col-md-6 col-12" role="group">
							<input type="submit" class="btn btn-secondary" name="submit" value="Login" />
						</div>
					</form>
				</div>
			</div>
			<div class="card-footer">
				<div class="text-center">
					<a href="<?php site_url() ?>register"><button type="button" class="btn btn-secondary col-lg-4 col-xl-4 col-md-6 col-10">Pas encore inscrit ?</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>