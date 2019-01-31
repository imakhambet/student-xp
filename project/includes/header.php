<header>

    <nav>
        <ul>
            <li><a href="allEntries.php">All entries</a></li>
            <li><a href="countries.php" id="country">Countries</a>
            <ul>
                <li><a href="entriesByCountry.php?byCountry=USA">USA</a></li>
                <li><a href="entriesByCountry.php?byCountry=United%20Kingdom">United Kingdom</a></li>
                <li><a href="entriesByCountry.php?byCountry=Canada">Canada</a></li>
                <li><a href="entriesByCountry.php?byCountry=Germany">Germany</a></li>
                <li><a href="entriesByCountry.php?byCountry=South%20Korea">South Korea</a></li>
                <li><a href="entriesByCountry.php?byCountry=Switzerland">Switzerland</a></li><li><a href="countries.php"><b>OTHER</b></a></li>
            </ul>
            </li>
            <?php if (isset($_SESSION['username'])) : ?>
                <li><a href="userPage.php" id="usernameNav"><?php  echo $_SESSION['username'] ?> </a></li>
                <li><a href="index.php?logout='1'" id="logoutNav">Log out</a></li>
            <?php else: ?>
                <li><a href="login.php" id="loginPage">Login</a></li>
                <li><a href="signup.php" id="signupPage">Sign Up</a></li>
            <?php endif ?>
        </ul>
    </nav>			
    
    <!-- logo -->
    <div class="logo">
        <a href="index.php" class="graphicLogo" title="Main page"><span>student | XP</span><p>student experience from around the world</p></a>        
        <a href="index.php" class="textLogo" title="Main page"><span>student | XP</span></a>
    </div>
    

</header>
