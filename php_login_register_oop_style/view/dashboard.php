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
                    
                    <form action="../Http/userinfoupgrade.inc.php" method="POST" enctype="multipart/form-data">

                    <div class="text-center">
                        <img src="../public/profiles/<?php echo $userdetail['image']  ?>" id="profile" class="rounded" style="width: 100px;height:100px;"  alt="">
                        <input type="file" hidden id="fileinput" name="image">
                    </div>
                        <input type="text" hidden name="id" value="<?php echo $_SESSION['id']?>">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="<?php echo $userdetail['name']?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" readonly value="<?php echo $userdetail['email']?>" name="email">
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-primary" name="upgrade">Update</button>
                            <a href="forgot_password.php">Update Password</a>
                        </div>
                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>
</div>




<?php include "../layout/footer.php" ; ?>