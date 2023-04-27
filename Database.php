<?php

 

    define('HOST', 'localhost');

    define('DB_NAME','contact');

    define('USER','root');

    define('PASS','');

 

    $name = $_POST['name'];

    $email = $_POST["email"];

    $age = $_POST["age"];

    $message = $_POST["message"];

    $telephone = $_POST["telephone"]

   

 

    try{

        //On se connecte à la BDD

        $dbco = new PDO('mysql:host=localhost;dbname=siteweb;charset=utf8','root','admin');

        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   

        //On insère les données reçues

        $sth = $dbco->prepare("

            INSERT INTO contact(name, email, age)

            VALUES(:name, :email, :age, :telephone, :message)");

        $sth->bindParam(':name',$name);

        $sth->bindParam(':email',$email);

        $sth->bindParam(':age',$age);

        $sth->bindParam(':telephone', $telephone);

        $sth->bindParam(':message', $message);

        $sth->execute();

       

        //On renvoie l'utilisateur vers la page de remerciement

        header("Location:thankyou.html");

    }

    catch(PDOException $e){

        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();

    }

?>