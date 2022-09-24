<?php require_once "fragments/header.php" ?>


	<div class="container">
		<div class="row">
			<div class="col-12">
				<table class="table table-hover mt-5">
					<thead>
						<tr>

							<th>Id</th>
							<th>Title</th>
							<th>Description</th>
							<th>Cover</th>
							<th>Control</th>
							<th>Created_at</th>


						</tr>
					</thead>
					<tbody>
						<?php

							foreach (posts() as $post) {


								
								
						  ?>

								
							 
							<tr>
								<td class="align-middle"><?php echo $post['id'] ?></td>
								<td class="align-middle"><?php echo $post['title'] ?></td>
								<td class="align-middle"><?php echo $post['description'] ?></td>
								<td class="align-middle"><img src="assets/covers/<?php echo $post['cover'] ?> " style="width: 100px ; height: 100px; border-radius: 50%;" alt="This is Img"></td>
								<td class="align-middle d-flex">

										<a href="updatepost.php?id=<?php echo $post['id'] ?> && imageid=<?php echo $post['image_uniqid_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
										
										<?php

											if(isset($_POST["DEL_BTN"])){
												
												echo delete();
											}

										?>
										<form href="" class="d-inline" method="post">

												<input type="" name="imageid" hidden value=<?php echo $post['image_uniqid_id'] ?>>
											<input type="" name="id" hidden value=<?php echo $post['id'] ?>>
											<button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete This Post')" name="DEL_BTN">Delete</button>
										</form>

								</td>
								<td class="align-middle"><?php echo $post['created_at'] ?></td>

							</tr>

						<?php

                               
                             }



						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>	


<?php require_once "fragments/footer.php" ?>