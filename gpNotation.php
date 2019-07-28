<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Atlas</title>

    <!--imports the css, icons and fonts-->
    <link rel="stylesheet" type="text/css" href="css/indexStyle.css">
    <link rel="stylesheet" type="text/css" href="css/myStyle.css">

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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


    <!--defines a global variable-->
    <script type="text/javascript">
        mxBasePath = 'controller/mxgraph';
    </script>

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

</head>

<body onload="main(document.getElementById('graphContainer'))">
<div class="topMenu">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="imageHome">
            <a href="index.php">
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


<!--Top Bar-->
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
                <a class="dropdown-item" onclick="grafo.getXml()" href="javascript:void(0);"> <span class="tooltip">Save as .xml</span> <i
                        class="fa fa-save"></i> </a>
                <a class="dropdown-item" onclick="createLoadModalButtonClick()" href="javascript:void(0);"> <span
                        class="tooltip">Load Model</span> <i class="fa fa-upload"></i> </a>
                <a class="dropdown-item" onclick="show()" href="javascript:void(0)"> <span class="tooltip">Print</span> <i
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


<!--Top Bar Small Screen < 600 width-->
<div class="topBarIconGroupSmall" id="topBarIconGroupSmall">
    <a onclick="grafo.undoFunction()" href="javascript:void(0);">
        <span class="tooltip">Undo</span>
        <i class="fas fa-undo"></i> </a>
    <a onclick="grafo.redoFunction()" href="javascript:void(0);">
        <span class="tooltip">Redo</span>
        <i class="fas fa-redo"></i> </a>
    <a onclick="createLoadModalButtonClick()" href="javascript:void(0);">
        <span class="tooltip">Load Model</span>
        <i class="fa fa-upload"></i> </a>
    <a onclick="grafo.getXml()" href="javascript:void(0);">
        <span class="tooltip">Save as .xml</span>
        <i class="fa fa-save"></i> </a>
    <a onclick="show()" href="javascript:void(0)">
        <span class="tooltip">Print</span>
        <i class="fa fa-print"></i> </a>
</div>


<!--<div class="sideBar">-->
<!--    <div class="sideBarIconGroup">-->


<!--    </div>-->
<!--</div>-->

<!--Create Feature Modal-->
<div class="modal" id="modalFeature">
    <div id="featureModalContent" class="featureModalContent">
        <div class="closeButton">
            <a onclick="closePopUp(modalFeature);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
        </div>
        <label><b>Feature Name</b></label>
        <input id="featureName2" type="text" name="Fname" value="">
        <label><b>Feature type</b></label>
        <select id="featureType2">
            <option value="mandatory">Mandatory</option>
            <option value="optional">Optional</option>
            <option value="alternative">Alternative</option>
        </select>
        <p></p>
        <button id="createFeatureSubmitButton" onclick="createFeature(featureName2.value,featureType2.value)"
                type="submit">Create
        </button>
    </div>
</div>

<!--Create Association Modal-->
<div class="modal" id="modalAssociation">
    <div id="associationModalContent" class="associationModalContent">
        <div class="closeButton">
            <a onclick="closePopUp(modalAssociation);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
        </div>
        <label><b>Parent Feature</b></label>
        <select id="feature1id2" onchange="grafo.setSelectBoxChild()"></select>
        <label><b>Child Feature</b></label>
        <select id="feature2id2"></select>
        <p></p>
        <button id="createAssociationSubmitButton"
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

<!--Canvas-->
<div class="canvas" id="canvas">
    <div id="graphContainer">

    </div>


</div>

</body>

</html>