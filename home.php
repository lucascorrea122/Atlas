<?php
session_start();

?>

<html>

<head>
    <title>Atlas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--BootStrap CSS    -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">

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

</head>

<body>
<div>


        <?php require_once ("menu.php");?>
    <div class="parte1 d-flex align-items-stretch bannerText ">
        <div class="d-flex align-items-end " >


            <div class="text-center align-items-end" style="margin-bottom: 200px ;width: 45%;padding: 20px">
                <span style="color: white; font-size: 50px">Create feature templates for Software Product Lines with multiple notations.</span>
                <div class="animationArea">
                    <ul class="box-area">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>

            <div style="width: 40%; float:right" >
                <img class="homeMonitor" src="Models/Monitor.png" alt="Minha Figura">
            </div>


        </div>


    </div>

    <div class="part2 text-center">
        <span>Developed for Students, Teachers, Researchers, amog others</span>
        <hr>
        <img style="width: 150px; margin-top: 20px" class="homeMonitor" src="Models/logoLesse.png" alt="Minha Figura">
    </div>


</div>


<!-- <div id="carouselExampleIndicators" class="myCausel carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
    <div class="carousel-item active">
        <img class="d-block w-100" src="Models/img1.png" alt="First slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="Models/img2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
        <img class="d-block w-100" src="Models/img3.png" alt="Third slide">
    </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div> -->

</body>

</html>