<div class="h-100 container-fluid">
	<div class="h-100 row">
		<div class="card text-center text-white bg-danger col-12">
			<div class="card-header">
				<h1>Register</h1>
			</div>
			<div class="card-body container">
				<!-- Input Personne -->
				<div class="container row mx-auto mb-5">
					<div class="btn-group col-lg-6 col-xl-6 col-md-6" role="group">
						<input type="email" class="form-control" id="emailInput" placeholder="example@email.com">
					</div>
					<div class="btn-group col-lg-6 col-xl-6 col-md-6" role="group">
						<input type="password" class="form-control" id="passwordInput" placeholder="*****************">
					</div>
					<div class="btn-group col-lg-5 col-xl-5 col-md-5" role="group">
						<input type="input" class="form-control" id="usernameInput" placeholder="username">
					</div>
					<div class="btn-group col-lg-5 col-xl-5 col-md-5" role="group">
						<input type="input" class="form-control" id="yearsoldInput" placeholder="18">
					</div>
					<div class="btn-group col-lg-2 col-xl-2 col-md-2 mr-auto" role="group">
						<button type="button" class="btn btn-secondary">+</button>
					</div>
				</div>
				<div class="btn-group col-lg-2 col-xl-2 col-md-2 mr-auto" role="group">
					<a href="<?php site_url() ?>login"><button type="button" class="btn btn-secondary">Déjà inscrit ?</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!--
<h2>Inscription</h2>
    <?php //echo validation_errors(); ?>
    <?php //echo form_open('login/register') ?>
    <label for="login">Pseudo :</label>
        <input type="input" name="login" placeholder="Pseudo" maxlength="20" required/>
        <br>
    <label for="name">Nom :</label>
        <input type="input" name="name" placeholder="Nom" maxlength="50" required/>
        <br>
    <label for="firstname">Prénom :</label>
        <input type="input" name="firstname" placeholder="Prénom" maxlength="50" required/>
        <br>
    <label for="password">Mot de passe :</label>
        <input type="password" name="password" placeholder="********" maxlength="100" required/>
        <br>
    <label for="passwordverif">Confirmer mot de passe :</label>
        <input type="password" name="passwordverif" placeholder="********" maxlength="100"required/>
        <br>
        <input type="submit" name="submit" value="S'inscrire" />
        <br>
    </form>
    <div>
        <br>
        <a href="login">Déjà inscrit ?</a>
        <br>
    </div>-->