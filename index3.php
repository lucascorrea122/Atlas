<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atlas</title>
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"
          integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css"
          integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
    <script type="text/javascript">
        mxBasePath = './mxgraph';
    </script>


</head>
<body>
<div class="topMenu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="imageHome">
            <a href="index3.php">
                <img class="imageHome" src="Models/Atlas.png">
            </a>

        </div>
        <div class="iconsTopMenu collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="gpNotation.php">GP</a>
                </li>

            </ul>

        </div>


    </nav>
</div>

<div class="container">
    <label for="uname"><b>Notation:</b></label>
    <select id="notation" onchange="location.href = this.value;">
        <option value="">Select a Notation</option>
        <option value="./view/index.foda.html">Foda</option>
        <option value="./view/index.gp.html">GP</option>
    </select>

</div>

</body>

</html>


<div class="myNav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">WebAtlas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
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
                if (!isset($_SESSION['user'])) :
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <label id="labelName"> </label>
                <a id="btnSignIn" href="register.php" class="btn btn-outline-success my-2 my-sm-0"
                   type="submit">Sign in</a>
                <a href="register.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</a>

            </form>
            <?php
            endif;
            if (isset($_SESSION['user'])) :
                ?>

                <?php echo 'Welcome ' . $_SESSION['user'] ?>
                <a href="destroySession.php" class="btn btn-outline-success my-2 my-sm-0"
                   type="submit">Logouts</a>

            <?php
            endif;

            ?>
        </div>
    </nav>


</div>