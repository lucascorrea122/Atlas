<?php
include_once("connection.php");

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>

    <script src="processes.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>


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


            </ul>
            <form class="form-inline my-2 my-lg-0">

                <a id="btnSignIn" href="register.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign in</a>
                <a href="register.php"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</a>



            </form>
        </div>
    </nav>


</div>


<div class="registerLogin">

    <div class="register" id="loginUser">
        <label class="labelFormRegister">Sign in to WebAtlas</label>
        <div class="formLogin">
            <form method="post" action="login.php">
                <div class="formRegister form-group">
                    <label class="email">Email</label>
                    <input type="text" class="femailRegister form-control" id="registerInputEmail"
                           aria-describedby="emailHelp" name="loginEmail"
                           maxlength="40" placeholder="Your Email">

                    <label class="inputPassword">Password</label>
                    <input type="password" class="form-control" id="registerInputPassword" placeholder="Your Password"
                           name="loginPassword">


                </div>
                <button id="btnLogin" type="submit" class="btn btnLogin btn-primary">Login</button>
            </form>
        </div>


    </div>


    <div class="register" id="registerUser">
        <label class="labelFormRegister">Create your personal account</label>
        <div>
            <form method="post" action="processes.php">
                <div class="formRegister form-group">
                    <label class="name">Name</label>
                    <input type="text" class="form-control" id="registerInputName" name="name" maxlength="40" required
                           aria-describedby="name" placeholder="Your Name">

                    <label Class="FormControlSelect">Select an area</label>
                    <select class="form-control" id="registerInputArea" name="selectArea">
                        <option> Select</option>
                        <?php
                        $query_levels_acess = "SELECT * FROM levels_acess";
                        $result_levels_acess = mysqli_query($connection, $query_levels_acess);
                        while ($row_levels_acess = mysqli_fetch_assoc($result_levels_acess)) { ?>
                            <option value="<?php echo $row_levels_acess['cod']; ?>">
                                <?php
                                echo $row_levels_acess['name'];
                                ?>

                            </option>   <?php
                        }
                        ?>

                    </select>

                    <label class="email">Email</label>
                    <input type="email" class="femailRegister form-control" id="registerInputEmail"
                           aria-describedby="emailHelp" name="email"
                           maxlength="40" placeholder="Your Email">
                    <small id="emailHelp" class="form-text text-muted">We will never share your email with anyone.
                    </small>

                    <label class="inputPassword">Password</label>
                    <input type="password" class="form-control" id="registerInputPassword" placeholder="Your Password"
                           name="password">


                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>

    </div>
</div>


</body>


</html>