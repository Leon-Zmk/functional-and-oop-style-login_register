<?php include "../Http/Auth.inc.php" ; ?>
<?php include "../layout/header.php"; ?>



<div class="container vh-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12">
            <div class="text-white">
                <h1 >Dashboard</h1>
                <h1><?php echo $_SESSION['username'] ?></h1>
            </div>
        </div>
    </div>
</div>




<?php include "../layout/footer.php" ; ?>