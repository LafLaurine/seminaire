<!-- Traitement de l'inscription -->

<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/connexion.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/controller/controllerFlux.php';

//test si le mail est pris ou non
function testEmailValidity ($email) {
    $db = connectBd ();
    $req = $db->query("SELECT * FROM user WHERE email = '$email';");
    $result = $req->fetch();
    if ($result)
        return true;
    else
        return false;
}

/// Récupération des variables issues du formulaire par la méthode post
$firstname = filter_input(INPUT_POST, 'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$anniversary = filter_input(INPUT_POST, 'anniversary');
$sexe = filter_input(INPUT_POST, 'sexe');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$password_confirm = filter_input(INPUT_POST, 'password_confirm');


try
{
    $db = connectBd ();
    // Si le formulaire est envoyé
    if (isset($_POST['submit']))
    {
        // Teste que les valeurs ne sont pas vides ou composées uniquement d'espaces
        $email = trim($email) != '' ? $email : null;
        $password = trim($password) != '' ? $password : null;
        $mailValidity = testEmailValidity($email);



        //redirige en GET si nom utilisateur existe déjà
        if ($mailValidity) {
            header("Location: ../index.php");
        }

        //Association des éléments que l'user a entré à la BD
        else {

            if ($password == $password_confirm)
            {

                // Password du form
                $hash = hash("sha256",$password);

                $req = $db->prepare('INSERT INTO user(firstname, lastname, anniversary, sexe, email, password) VALUES (?,?,?,?,?,?)');

                $req->bindParam(1, $firstname);
                $req->bindParam(2, $lastname);
                $req->bindParam(3, $anniversary);
                $req->bindParam(4, $sexe);
                $req->bindParam(5, $email);
                $req->bindParam(6, $hash);

                $req->execute();

                if($req)
                {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                     }
                        $_SESSION ['flash']['success']='Bienvenue sur Mews!';
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $email;
                        $_SESSION['id_user']= $db->lastInsertId();
                        $_SESSION["articles"]["articles"]=array();
                        $flux_list = (new ControllerFlux())->addDefaultFlux();

                        setcookie('email', $_POST['email'], time() + 365*24*3600, null, null, false, true);
                        header( 'Location: ../page.php');
                }
            }
            else
            {
              session_start();
              $_SESSION ['flash']['danger']="Un problème est survenue lors de l'inscription";
                header( 'Location: ../index.php');
            }

        }
    }

    else
    {
        echo("Non soumis");
    }
}

catch (PDOException $e)
{
    //exit('Erreur, problème de connexion à la base');
    echo $e->getMessage();
}
?>
