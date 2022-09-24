<?php require 'php/if_auth.php' ?>
<?php require_once "fragments/header.php" ?>

	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="post-form p-5">
					<?php

							if(isset($_POST['REG_BTN'])){
								echo register();
							}

						?>

					<form action="" method="post">
						<div class="form-group">
							<label for="name">name</label>
							<input class="form-control" type="text" id="name" name="name"></input>
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control" type="email" id="email" name="email"></input>
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control" type="password" id="password" name="password"></input>
						</div>
							
							<button class="btn btn-secondary" name="REG_BTN">Register</button>

				   </form>
				</div>
			</div>
		</div>
	</div>



<?php require_once "fragments/footer.php" ?>;