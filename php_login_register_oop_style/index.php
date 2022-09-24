<?php
session_start()
?>
<?php include "fontlayout/header.php"; ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
            

            </ul>
            <?php 

            if(isset($_SESSION['id'])){


            ?>
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item text-white  me-2">
                 <a href="./view/dashboard.php" class="btn btn-outline-secondary">Dashboard</a>
                </li>
                <li class="nav-item">
                    <form action="./Http/logout.inc.php" class="d-inline-block" method="POST">
                        <button class="btn btn-outline-secondary" name="logout">logout</button>
                    </form>
                </li>
            </ul>
            <?php
            }else{

            ?>
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./view/register.php">Register</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./view/login.php">Login</a>
                </li>
            </ul>
            <?php

            }
            ?>
            
            
            </div>
        </div>
       </nav>
        </div>
    </div>
</div>



<?php include "fontlayout/footer.php" ; ?>