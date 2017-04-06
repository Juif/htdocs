<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/module_texteTrou.css">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="jquery-3.1.1.js"></script>
    <script src="module_texteTrou.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

    <title></title>
</head>
<body>
<div>
    <header>
        <style>
            .navbar-default {
                background-color: #2aabd2;
            }

            .navbar-default .navbar-nav > li > a {
                color: #ffffff;
            }

            .navbar-default .navbar-nav {
                text-align: center;
            }

            .navbar-brand {
                font-size: 45px;
                padding-right: 30px;
                margin-right: 35px;
            }

            .navbar-form {
                width: 300px;
            }

        </style>

        <nav class="navbar navbar-default">
            <div container-fluid>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Mathrix</a>
                </div>
                <form class="navbar-form navbar-left">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Rechercher">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <ul class="nav navbar-nav navbar">
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">En direct</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Classe</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-bell"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pseudo
                            <i class="glyphicon glyphicon-triangle-bottom"></i>
                            <span class="carpet"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Mon compte</a></li>
                            <li><a href="#">Premium</a></li>
                            <li><a href="#">Deconnection</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <p>
    <p id="retour"><a href="#">< Retour
        </a></p>
    <article id="bar_titre">
        <aside>
            <nav class="navbar navbar-right">
                <ul class="menuAside">
                    <li class="active"><a href="#"><i class="glyphicon glyphicon-play"></i> Cours</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-pencil"></i> Activité 1</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-align-left"></i> Activité 2</a></li>
                </ul>
            </nav>
        </aside>

        <div id="title">

            <h2>Texte à trou</h2>

            <style>
                #progressBar {
                    height: 17px;
                    width: 170px;
                    border: 2px solid #777777;
                    text-decoration-color: #c7254e;

                }
            </style>

            <div id="progressBarDiv">
                <progress id="progressBar" value="0" max="100"></progress>
                <!--<i class="glyphicon glyphicon-star-empty"></i>-->

            </div>
            <a href="#" id="buttonFavoris"><i class="glyphicon glyphicon-heart-empty"></i> </a>
        </div>

        <p></p>
    </article>

    <div id="exercices-reponses">
        <article id="exercices">

            <button  id="idExercice1">1</button>
            <button  id="idExercice2">2</button>
        </article>


        <article id="reponses">
            <div id="exo1">

                <div id="partie1">
                    <?php

                    $idExercice = $_GET["idExercice"];

                    include("config.php");


                    function scrollbarrTitle1($idExercice, $bdd)


                    {
                        $reponse = $bdd->query('SELECT id_exercic, titreScroll, id FROM scrollBarr
                             WHERE scrollBarr.id_exercic = 1 ');

                        $title = array();
                        $title['id_exercic'] = array();
                        $title['id'] = array();
                        $title['titreScroll'] = array();

                        while ($donnees = $reponse->fetch()) {

                            array_push($title['id_exercic'], $donnees['id_exercic']);
                            array_push($title['id'], $donnees['id']);
                            array_push($title['titreScroll'], $donnees['titreScroll']);
                        }


                        return $title;

                    }

                    $title = scrollbarrTitle1($idExercice, $bdd);


                    for ($i = 0; $i < count($title['titreScroll']); $i++) {

                        echo $title ['titreScroll'][$i];

                    }

                    ?>


                    <label for="reponse1"></label><br/>
                    <select name="reponse1" id="reponse1">

                        <?php
                        function rechercheOptions1($idExercice, $bdd)
                        {
                            $reponse = $bdd->query('SELECT id,choix, id_scrollBarr, answer FROM choix	 WHERE id_ex=1 ');


                            $res = array();
                            $res['id'] = array();
                            $res['id_scrollBarr'] = array();
                            $res['choix'] = array();
                            $res['answer'] = array();


                            while ($donnees = $reponse->fetch()) {

                                array_push($res['id'], $donnees['id']);
                                array_push($res['id_scrollBarr'], $donnees['id_scrollBarr']);
                                array_push($res['choix'], $donnees['choix']);
                                array_push($res['answer'], $donnees['answer']);

                            }

                            return $res;

                        }

                        $res = rechercheOptions1($idExercice, $bdd);

                        for ($i = 0; $i < count($res['choix']); $i++) {

                            ?>
                            <option value="<?php echo $res["answer"][$i]; ?>"> <?php echo $res["choix"][$i]; ?></option>' ;
                            <?php


                        }

                        ?>
                    </select>
                    <?php


                    $reponse = $bdd->query('SELECT answer FROM choix WHERE answer="' . "true" . ' " ');

                    while ($donnees = $reponse->fetch()) {


                        ?>



                    <?php } ?>
                    <p></p>
                    <div class="buttonValidHint">
                        <button type="button" onclick="correction()" class="btn btn-warning" id="boutonValider">Valider
                        </button>
                        <button type="button" onclick="giveTips()" class="btn btn-info" id="boutonIndice">Afficher les
                            indices
                        </button>
                    </div>

                    <div id="indices">
                        <?php
                        function indices1($idExercice, $bdd)
                        {

                            $indice = $bdd->query('SELECT indice FROM indice WHERE id_exercice="' . $idExercice . '" ');

                            $dons = array();
                            $dons['indice'] = array();

                            while ($done = $indice->fetch()) {

                                array_push($dons['indice'], $done['indice']);


                            }

                            return $dons;

                        }

                        $dons = indices1($idExercice, $bdd);

                        $arrayLengths = count($dons['indice']);
                        for ($i = 0; $i < $arrayLengths; $i++) {

                            {

                                echo "<li>" . $dons['indice'][$i] . "</li>";

                            }
                        }
                        ?>

                    </div>

                </div>



                <script>

                    function giveTips() {


                        $('#indices').show();
                        $('.btn-info').css("background-color", "#adadad");

                    }
                </script>
                <script>

                    var progress = 0;
                    var nombreExo = 3;

                    function correction() {


                        if ($('#reponse3').val() === "true") {

                            $('#reponse3').css('background-color', '#67b168');
                            progress = 100 / nombreExo;
                            nombreExo--;
                            $('#progressBar').val(progress);

                        }
                        else {
                            $('#reponse3').css(
                                "background-color", "#a94442");
                        }

                        if ($('#reponse1').val() === "true") {

                            $('#reponse1').css('background-color', '#67b168');
                            progress = 100 / nombreExo;
                            nombreExo--;
                            $('#progressBar').val(progress);

                        }
                        else {
                            $('#reponse1').css(
                                "background-color", "#a94442");
                        }



                        if ($('#reponse2').val() === "true") {

                            $('#reponse2').css('background-color', '#67b168');
                            progress = 100 / nombreExo;
                            nombreExo--;
                            $('#progressBar').val(progress);

                        }
                        else {
                            $('#reponse2').css(
                                "background-color", "#a94442");
                        }

                    }
                </script>

            </div>
    </div>
    </article>
</div>
</body>
</html>