<?php
session_start()
?>
<html>
<head>
    <title>Atlas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--BootStrap CSS    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">

    <!-- JS Script -->
    <script src="processes.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>


    <!--ICons    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css"
          integrity="sha384-v2Tw72dyUXeU3y4aM2Y0tBJQkGfplr39mxZqlTBDUZAb9BGoC40+rdFCG0m10lXk"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css"
          integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P"
          crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
          crossorigin="anonymous">
</head>
<body>

<?php require_once ("menu.php");?>

<!--<div class="myNav">-->
<!--    <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--        <a class="navbar-brand" href="home.php">WebAtlas</a>-->
<!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"-->
<!--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!---->
<!--        <div class="collapse navbar-collapse" id="navbarSupportedContent">-->
<!--            <ul class="navbar-nav mr-auto">-->
<!--                <li class="nav- item active dropdown">-->
<!--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"-->
<!--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--                        Atlas Modeler<span class="sr-only">(current)</span>-->
<!--                    </a>-->
<!--                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">-->
<!--                        <a class="dropdown-item" href="fodaNotation.php">FODA</a>-->
<!--                        <div class="dropdown-divider"></div>-->
<!--                        <a class="dropdown-item" href="gpNotation.php">GP</a>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="nav-item active">-->
<!--                    <a class="nav-link" href="webAtlasRepository.php">Atlas Repository </a>-->
<!--                </li>-->
<!--                <li class="nav-item active">-->
<!--                    <a class="nav-link" href="about.php">About </a>-->
<!--                </li>-->
<!---->
<!---->
<!--            </ul>-->
<!--            <form class="form-inline my-2 my-lg-0">-->
<!--                <label id="labelName"> </label>-->
<!--                <a id="btnSignIn" href="register.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign in</a>-->
<!--                <a href="register.php"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</a>-->
<!---->
<!---->
<!---->
<!--            </form>-->
<!--        </div>-->
<!--    </nav>-->
<!---->
<!---->
<!--</div>-->


<div class="about">

    <div class="textAbout">
        <img class="imgAbout" src="Models/WebAtlas.png">
        <p class="textAbout">
            The present tool has as one of its main purposes the academic bias, in such a way that it is focused to the classroom with the intention of teaching or
            assisting the learning of SPL in Institutions of Higher Education. Through the analysis of SPL modeling tools that were found in the literature, some objectives
            were outlined to fill some gaps that they had, so it is possible to work with their scalability. The following objectives are:
        </p>
    </div>
    <ul>

        <li><a><i class="iconsAbout fas fa-caret-right"></i>  The tool should enable the creation and editing of characteristic models on FODA,
                Generative Programming and Cardinality-based notations. In addition, it will be possible to convert between such notations.</a></li>
        <br><br>
        <li><a><i class="iconsAbout fas fa-caret-right"></i>  The tool should export and import models from other tools.</a></li>
        <br><br>
        <li><a><i class="iconsAbout fas fa-caret-right"></i> The tool should allow the creation and correction of tasks by the teachers and sending of tasks by the students.</a></li>
    </ul>

</div>

</body>
</html>