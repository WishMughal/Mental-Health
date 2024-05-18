<head>
    <!-- for login page some links -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/logo.jpg" type="image/x-icon">
    <meta name="description" content="Test your mental health for 6 diseases with our user-friendly questionnaires. Save your results by logging in or signing up.">

    <!-- Style for Dropdown Menu -->
    <link rel="stylesheet" href="assets/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="assets/bootstrap/mobirise2.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap-grid.min.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="assets/parallax/jarallax.js">
    <link rel="stylesheet" href="assets/dropdown/css/style.css">
    <link rel="stylesheet" href="assets/socicon/css/styles.css">
    <link rel="stylesheet" href="assets/theme/css/style.css">
    <link rel="preload" href="assets/css/fonts.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="assets/css/fonts-1.css"></noscript>
    <link rel="stylesheet" href="assets/css/mbr-additional.css" text/css">
</head>

<section data-bs-version="5.1" class="menu menu2 cid-ucj46c7yME" once="menu" id="menu-5-ucj46c7yME">
    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
        <div class="container">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/logo1.jpg" alt="MindProbe" style="height: 4.3rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="index.php">MindProbe</a></span>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="tips.php" aria-expanded="false">Tips for better health</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="#" aria-expanded="false">Learn About Diseases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-black display-4" href="#" aria-expanded="false">Disease Tests</a>
                        <div class="dropdown-content">
                            <a href="depression.php">Depression</a><br>
                            <a href="anxiety.php">Anxiety Disorder</a><br>
                            <a href="bipolar.php">Bipolar Disorder</a><br>
                            <a href="autism.php">Autism Spectrum Disorder</a><br>
                            <a href="psychopathy.php">Psychopathy</a><br>
                            <a href="prolongedgrief.php">Prolonged Grief Disorder (PGD)</a>
                        </div>
                    </li>
                </ul>
                <div class="navbar-buttons mbr-section-btn">
                    <?php
                        // Check if user is logged in
                        if(isset($_SESSION['user'])) {
                            echo '<div class="dropdown">';
                            echo '<button class="dropbtn">' . $_SESSION['user'] . '</button>';
                            echo '<div class="dropdown-content">';
                            // Add any additional dropdown items here
                            echo '<a href="logout.php">Logout</a>';
                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo '<a id="loginBtn" class="btn btn-primary display-4" href="#" onclick="openLoginPopup()">Login/Signup</a>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</section>
<!-- Include login popup -->
<?php include 'loginpop.php'; ?>