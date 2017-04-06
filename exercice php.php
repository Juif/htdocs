
<?php
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
    // Testons si le fichier n'est pas trop gros
    if ($_FILES['monfichier']['size'] <= 1000000)
    {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES['monfichier']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $extensions_autorisees))


            $now = DateTime::createFromFormat('U.u', microtime(true));
            $now->format("m-d-Y H:i:s.u");
            $newname = $extension_upload.'_'.date($now->format("m-d-Y H:i:s.u"));

            $full_local_path = 'uploads/'.$newname.'.'.$extension_upload ;
        {
            // On peut valider le fichier et le stocker définitivement
            move_uploaded_file($_FILES['monfichier']['tmp_name'],$full_local_path );
            echo "L'envoi a bien été effectué !";
        }
    }
}
?>