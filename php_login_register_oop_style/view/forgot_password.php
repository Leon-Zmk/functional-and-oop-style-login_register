<?php include "../Http/Auth.inc.php" ; ?>
<?php include "../layout/header.php"; ?>


<?php


    $userdetail=$user->userShow($_SESSION['id']);
    print_r($userdetail);

?>

<div class="container vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12">
           <div class="d-flex justify-content-between">
           <div class="text-white ">
                <h1 >Dashboard</h1>
                <h1><?php echo $_SESSION['username'] ?></h1>
            </div>
            <div class="" style="margin-right: 200px;">
                
                <div class="text-white">
                    
                    <form action="../Http/userpassupgrade.inc.php" method="POST">

                        <input type="text" hidden name="id" value="<?php echo $_SESSION['id']?>">
                        <div class="form-group">
                            <label for="">old Password</label>
                            <input type="text" class="form-control"  name="old_password">
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label>
                            <input type="text" class="form-control"  name="new_password">
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" name="upgradepass">Update Password</button>
                           
                        </div>

                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>




<?php include "../layout/footer.php" ; ?>