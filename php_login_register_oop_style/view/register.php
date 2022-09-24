
<?php include "../layout/header.php"; ?>



<div class="container vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-4">
           <div class="bg-black">
           <div class="card">
                <div class="card-header text-center">
                   <span>Register</span>
                </div>
                <div class="card-body">

                <?php


                ?>
                    <form action="../Http/register.inc.php" method="POST">
                        <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" require>
                        </div>

                        <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" require>
                        </div>

                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" require>
                        </div>

                        <div class="form-group">
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" require>
                        </div>

                        <div class="form-group mt-2">
                        <button class="btn btn-sm btn-primary " name="register">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                        <span class=" text-bold">Already Have An Account? <a href="login.php" class="text-primary">Login Here</a></span>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>




<?php include "../layout/footer.php" ; ?>