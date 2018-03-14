<!-- Traitement de la connexion -->

<?php
header('Content-type: text/html; charset=UTF-8');
session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/seminaire/model/connexion.php';

//Teste si l'utilisateur existe
function userExists()
{
    $db = connectBd();
    $email = $_POST['email'];
    $query = $db->query("SELECT * FROM user WHERE email ='$email';");
    $result = $query->fetch();
    return $result;

}

//Récupération des variables
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (isset($email,$password))
{

    if(userExists($email))
    {
        try
        {
            $db = connectBd();
            $options = [
                'cost' => 11,
                'salt' => 111111111111111111111111111
            ];

            //On crypte à nouveau le mot de passe afin de vérif avec le bon
            $hash = hash("sha256",$password);

            // Vérification des identifiants
            $query = "SELECT * FROM user WHERE (email = :email AND password = :hash);";
            $req = $db->prepare($query);
            $req->bindParam('email', $email, PDO::PARAM_STR, 32);
            $req->bindParam('hash', $hash , PDO::PARAM_STR, 255);
            $req->execute();
            $result = $req->fetch(PDO::FETCH_ASSOC);

            //Teste si le mot de passe est associé avec le pseudo
            if ($result)
            {
                if (!session_id())
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $result['lastname'];
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['id_user']= $result['id_user'];
                $_SESSION["articles"]["articles"]=array();
                header('Location: ../index.php');

            } else
            {
                header( 'Location: ../index.php');
                session_start();
                  $_SESSION ['flash']['danger']='Email ou mot de passe incorrect';
            }

        }


        catch (PDOException $e)
        {
           echo 'Erreur, problème de connexion à la base';
        }

    }

    else
    {
      session_start();
      $_SESSION ['flash']['danger']='Erreur de connection';
        header( 'Location: ../index.php');
    }





}

else
{
    header( 'Location: ../index.php?action=empty');

}
?>
