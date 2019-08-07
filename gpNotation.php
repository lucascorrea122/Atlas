<html>

<head>
    <title>Atlas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--BootStrap CSS    -->
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">


    <!--Imagens    -->
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


    <!-- JS Script -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <!--gps specifics imports-->
    <script src="controller/js/gp/LoadXml.js"></script>
    <script src="controller/js/gp/ValidationScript.js"></script>
    <script src="controller/js/gp/Feature.js"></script>
    <script src="controller/js/gp/Graph.js"></script>
    <script src="controller/js/gp/Association.js"></script>
    <script src="controller/js/gp/CreateFeature.js"></script>
    <script src="controller/js/gp/AlternativeAssociation.js"></script>
    <script src="controller/js/gp/ChangeType.js"></script>

    <!--general imports-->
    <script src="controller/js/FunctionBezierCurve.js"></script>
    <script src="controller/js/Modal.js"></script>
    <script src="controller/js/AdjustCanvas.js"></script>
    <script src="controller/js/Download.js"></script>
    <script src="controller/js/SavePng.js"></script>
    <script src="controller/js/FunctionsCanvas.js"></script>

    <!--mxgraphs specifics imports-->
    <script src="controller/mxgraph/mxClient.js"></script>

    <script>
        document.getElementById('featureName2').focus();
    </script>

</head>

<body onload="main(document.getElementById('graphContainer'))">

<div class="myNav">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
        <a class="navbar-brand" href="home.php">Atlas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active dropdown">
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
                    <a class="nav-link" href="#">Atlas Repository </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button id="btnSignIn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign in</button>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Up</button>
            </form>
        </div>
    </nav>

</div>

<div class="topBar">

    <div class="topBarIconGroup" id="topBarIconGroup">

        <li>
            <a onclick="grafo.clearGraph()" href="javascript:void(0);">
                <span class="tooltip">Create Model</span>
                <i class="fas fa-file"></i> </a>

        </li>

        <li class="iconsTopBar nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTools" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="tooltip">Tools</span>
                <i class="fa fa-tools"></i> </a>
            <div class="sideBar dropdown-menu" id="group" aria-labelledby="navbarDropdownTools">
                <a class="dropdown-item" onclick="showPopUp(modalFeature);" href="javascript:void(0);">
                    <span class="tooltip">Create Feature</span>
                    <i class="fas fa-plus-square"></i></a>
                <a class="dropdown-item" onclick="showPopUp(modalAssociation);" href="javascript:void(0);">
                    <span class="tooltip">Create Association</span>
                    <i class="fas fa-arrows-alt-v"></i></a>
            </div>
        </li>

        <li class="iconsTopBar nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownFunctions" role="button"
               data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <span class="tooltip">Functions</span>
                <i class="fa fa-list"></i> </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownFunctions">
                <a class="dropdown-item" onclick="grafo.getXml()" href="javascript:void(0);"> <span class="tooltip">Save as .xml</span>
                    <i
                            class="fa fa-save"></i> </a>
                <a class="dropdown-item" onclick="createLoadModalButtonClick()" href="javascript:void(0);"> <span
                            class="tooltip">Load Model</span> <i class="fa fa-upload"></i> </a>
                <a class="dropdown-item" onclick="show()" href="javascript:void(0)"> <span class="tooltip">Print</span>
                    <i
                            class="fa fa-print"></i> </a>
                <a class="dropdown-item" onclick="validateModel()" href="javascript:void(0);">
                    <span class="tooltip">Check Model</span>
                    <i class="fa fa-check"></i></a>

            </div>
        </li>

        <li>
            <a onclick="grafo.undoFunction()" href="javascript:void(0);">
                <span class="tooltip">Undo</span>
                <i class="fas fa-undo"></i> </a>
            <a onclick="grafo.redoFunction()" href="javascript:void(0);">
                <span class="tooltip">Redo</span>
                <i class="fas fa-redo"></i> </a>
        </li>
    </div>
    <li>
        <input id="modelName" class="modelName" type="text" placeholder="Model name">
    </li>
</div>

<div class="modal modalFeature" id="modalFeature" >
    <div id="featureModalContent" class="featureModalContent form-group">
        <div class="closeButton">
            <a onclick="closePopUp(modalFeature);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
        </div>
        <label><b>Feature Name</b></label>
        <input class="form-control" id="featureName2" type="text" name="Fname" >
        <label><b>Feature type</b></label>
        <select class="form-control" id="featureType2">
            <option value="mandatory">Mandatory</option>
            <option value="optional">Optional</option>
            <option value="alternative">Alternative</option>
        </select>
        <p></p>
        <button class="btn" id="createFeatureSubmitButton"

                onclick="createFeature(featureName2.value,featureType2.value)"
                type="submit">Create
        </button>

    </div>
</div>

<div class="modal modalFeature" id="modalAssociation">
    <div id="associationModalContent" class="associationModalContent form-group">
        <div class="closeButton">
            <a onclick="closePopUp(modalAssociation);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
        </div>
        <label><b>Parent Feature</b></label>
        <select class="form-control" id="feature1id2" onchange="grafo.setSelectBoxChild()"></select>
        <label><b>Child Feature</b></label>
        <select class="form-control" id="feature2id2"></select>
        <p></p>
        <button class="btn" id="createAssociationSubmitButton"
                onclick="grafo.createAssociation(feature1id2.value,feature2id2.value)"
                type="submit">Create
        </button>
    </div>
</div>

<!--Load File Modal-->
<div class="modal" id="loadFileModal">
    <div id="loadFileModalContent" class="loadFileModalContent">
        <div class="closeButton"><a onclick="closePopUp(loadFileModal);" href="javascript:void(0);"><i
                        class="fa fa-times"></i></a><br/>
        </div>
        <label><b>Select File</b></label><br/>
        <input id="fileInput" type="file" accept=".xml" value="select"><br/>
        <button id="loadFileSubmitButton" onclick="loadFile(grafo.model)" type="submit">Import</button>
    </div>
</div>

<div class="modal " id="modalConstraint" >
    <div class="constrainModalContent" id="constrainModalContent">
        <div class="headConstraint">
            <label id="labelConstraint" class="labelConstraint">Create new Constraint</label>
        </div>
        <hr>
        <div class="featuresConstraintModal" id="featuresConstraintModal">

        </div>
        <hr>
        <div class="operationsConstraint">
            <input class="btn btn-primary" onclick="createConstraint('And')" type="submit" value="And">
            <input class="btn btn-primary" onclick="createConstraint('Or')" type="submit" value="Or">
            <input class="btn btn-primary" onclick="createConstraint('Not')"  type="submit" value="Not">
            <input class="btn btn-primary" onclick="createConstraint('Implies')"type="submit" value="Implies">
            <input class="btn btn-primary" onclick="createConstraint('if')" type="submit" value="If">
            <input class="btn btn-primary" onclick="createConstraint('(')" type="submit" value="(">
            <input class="btn btn-primary" onclick="createConstraint(')')" type="submit" value=")">

        </div>
        <hr>
        <div class="form-group">
            <label for="formControlTextarea">Constraint</label>
            <input type="text" class="form-control" id="inputConstraint" name="name"
                   placeholder="Constraint" >

<!--            <textarea class="form-control" id="formControlTextarea" rows="1"></textarea>-->
        </div>

        <input class="createConstraint btn btn-success" type="submit" value="Create Constraint">

        <input class="destoryModelConstraint btn btn-danger" type="submit" value="Cancel" onclick="closePopUp(modalConstraint)">
    </div>
</div>

<div class="canvas" id="canvas">
    <div id="graphContainer">

    </div>
</div>


</body>

</html>