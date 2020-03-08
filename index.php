<?php
if (isset($_POST['name'], $_POST['email'], $_POST['password'])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=php_form;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = 'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)';

    $q = $bdd->prepare($query);
    // ça permet de remplacer les variables présents dans la requête SQL (précédées par le symbole ':')
    // par les vraies variables qu'on a récupérées de notre formulaire
    $q->bindParam(":name", $name);
    $q->bindParam(":email", $email);
    $q->bindParam(":password", $password);
    $q->execute();
}
?>
​
​
​
<!DOCTYPE html>
<html lang="fr">
​

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Manjari&display=swap" rel="stylesheet">
    <title>Sign in</title>
    <script src="https://kit.fontawesome.com/d8e82093ad.js" crossorigin="anonymous"></script>
</head>
​

<body>
    ​
    <main>
        <div class="container">
            <div>
                <h1>HELLO, FRIEND</h1>
                <h4>Sign up to start working with us</h4>
            </div>
            <div>
                <div>
                    ​
                    <form action="index.php" method="POST" class="formulaire">
                        ​
                        <input class="field" type="text" name="name" placeholder="Name">
                        ​
                        <input class="field" type="email" name="email" placeholder="E-mail">
                        ​
                        <input class="field" type="password" name="password" placeholder="Password" id="myInput">
                        ​
                        <div class="btn-container">
                            <input class="btn sign-up" type="submit" value="Sign up">
                            <input class="btn sign-in" type="submit" value="Sign in">
                        </div>
                    </form>
                </div>
            </div>
            <div class="footer">
                <p>Sign up with</p>
                <i class="fab fa-linkedin-in"></i>
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
            </div>
        </div>
        <div class="image"></div>
    </main>
    ​
</body>
​

</html>