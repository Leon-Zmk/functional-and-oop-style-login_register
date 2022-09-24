<?php require_once "php/if_auth.php" ?>
<?php require_once "fragments/header.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-4 mt-5">

					<?php

						if(isset($_POST['LOG_BTN'])){

							echo login();

						}

					?>

				<form href="" method="post">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" class="form-control"></input>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="text" name="password" id="password" class="form-control"></input>
					</div>
					<button class="btn btn-secondary" name="LOG_BTN">Login</button>
				</form>
			</div>
		</div>
	</div>


<?php require_once "fragments/footer.php"?>