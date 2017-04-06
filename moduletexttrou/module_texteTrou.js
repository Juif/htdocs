$(document).ready(function(){


    $("#buttonFavoris").on('click', function()
    {
        $("#buttonFavoris").find('i').toggleClass('glyphicon-heart-empty').toggleClass('glyphicon-heart');

    });

//changer l'adresse du load par les noms des fichiers

    $('#idExercice2').on('click',function() {

        $('#exo1').load("http://localhost:8888/moduletexttrou/module_texteTrou2.php?idExercice=2 #partie2");

    });

    $('#idExercice1').on('click',function() {

        $('#exo1').load("http://localhost:8888/moduletexttrou/module_texteTrou.php?idExercice=1 #partie1" );
    });

});

