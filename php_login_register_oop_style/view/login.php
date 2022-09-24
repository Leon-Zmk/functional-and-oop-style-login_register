
<?php include "../layout/header.php"; ?>



<div class="container vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-4">
           <div class="bg-black">
           <div class="card">
                <div class="card-header text-center">
                   <span>Login To Admi Panel</span>
                </div>
                <div class="card-body">
                    <form action="../Http/login.inc.php" method="POST">
                        <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" require>
                        </div>
                        <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" require>
                        </div>

                        <div class="form-group mt-2">
                        <button class="btn btn-sm btn-primary " name="login">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                        <span class=" text-bold">Don't Have An Account Yet? <a href="register.php" class="text-primary">Register Here</a></span>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>




<?php include "../layout/footer.php" ; ?>