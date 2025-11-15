<!-- includes/navbar.php -->
<div class="container-fluid p-0">
    <!-- First navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#A07855FF; padding: 20px 0;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>&nbsp;&nbsp;
                    <?php 
                    if (isset($_SESSION['username'])) {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/profile.php'>My account</a></li>";
                    } else {
                        echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_registration.php'>Register</a></li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a> 
                    </li>&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sup>&nbsp;<?php cart_item(); ?></sup></i></a>
                    </li>&nbsp;&nbsp;
                </ul>
                <form class="ml-auto" action="search_product.php" method="get">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <div class="input-group-append">&nbsp;
                            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <!-- Second navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#D4B996FF;">
        <ul class="navbar-nav me-auto">
            <?php
            if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome User</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_login.php'>Login</a></li>";
            } else {
                echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='./users_area/logout.php'>Logout</a></li>";
            }
            ?>
        </ul>
    </nav>
</div>
