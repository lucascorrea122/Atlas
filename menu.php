<html>
<head>


</head>


<body>
<div class="myNav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">WebAtlas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav- item active dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Atlas Modeler<span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="fodaNotation.php">FODA</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="gpNotation.php">GP</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="webAtlasRepository.php">Atlas Repository </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">About </a>
                </li>

                <?php
                if (!isset($_SESSION['user'])):
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <label id="labelName"> </label>
                <a id="btnSignIn" href="register.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign in</a>
                <a href="register.php"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</a>

            </form>
            <?php
            endif;
            if(isset($_SESSION['user'])):
                ?>

                <?php echo 'Welcome ' .$_SESSION['user']  ?>
                <a href="destroySession.php"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Logouts</a>

            <?php
            endif;

            ?>
        </div>
    </nav>


</div>


</body>
</html>