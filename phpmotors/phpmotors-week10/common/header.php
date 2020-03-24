<div id="top-header">
    <img src="/phpmotors/images/logo.png" alt="PHP Motors" id="logo">
    <?php 
        if(isset($cookieFirstname)){
            echo "<span id='cookie'>Welcome, $cookieFirstname</span>";
        }
    ?>
    <div class="align-center">
    <a href="/phpmotors/accounts/?action=login-page" class="acc">My Account</a>
    <?php 
        if(isset($_SESSION['loggedin'])){
    ?>
    | <a href="/phpmotors/accounts/?action=logout" class="acc">Logout</a>
    <?php 
        }
    ?>
    </div>
</div>
<nav>
    <?php echo $navList ?>
</nav>

