<?php
include('checkLogin.php');
$host = "localhost";
$user = "root";
$password = '';
$db_name = "login";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
    echo '<script>alert("mysqli_connect_error()")</script>';
}
?>

<html>

<head>

    <style type="text/css">
        body {
            background-color: #f8f3f3;
            font-family: Arial, sans-serif;
            background-repeat: repeat;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            color: black;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color:black;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #a47d55;
            border: none;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            margin-top: 10px;
            cursor: pointer;
            display: block;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
        }

        .display-link {
            text-align: center;
            margin-top: 20px;
        }

        .display-link a {
            text-decoration: none;
            color: #f9a7b0;
            font-weight: bold;
        }

        .remove-form {
            margin-top: 30px;
        }

        .error-message {
            color: #ff0000;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .success-message {
            color: #006600;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>

    <title>Page de Prêt</title>

</head>

<body>
    <div class="container">

        <?php
        if (isset($_GET['success'])) {
            echo '<div class="success-message">Prêt ajouté avec succès!</div>';
        }
        if (isset($_GET['error'])) {
            echo '<div class="error-message">Erreur lors de l\'ajout du prêt. Veuillez réessayer.</div>';
        }
        ?>

        <h2 class="title" style="background-color: #f9dcc4; padding: 10px; border-radius: 5px;">Ajout d'un Prêt</h2>

        <form action="insertToDB.php" method="post">

            <div class="form-group">
                <label>Nom:</label>
                <input type="text" name="name" required>
            </div>

            <div class="form-group">
                <label>ID abonné:</label>
                <input type="text" name="personID" required>
            </div>

            <div class="form-group">
                <label>Age:</label>
                <input type="text" name="age" required>
            </div>

            <div class="form-group">
                <label>Occupation:</label>
                <input type="text" name="occupation" required>
            </div>

            <div class="form-group">
                <label>ID de Document:</label>
                <input type="text" name="bookID" required>
            </div>

            <div class="form-group">
                <label>Titre de Document:</label>
                <input type="text" name="bookTitle" required>
            </div>

            <div class="form-group">
                <label>Type de Document:</label>
                <input type="text" name="bookType" required>
            </div>

            <div class="form-group">
                <label>Auteur de Document:</label>
                <input type="text" name="bookAuthor" required>
            </div>

            <div class="form-group">
                <label>Date de prêt:</label>
                <input type="date" name="loanDate" required>
            </div>

            <div class="form-group">
                <label>Date de Retour:</label>
                <input type="date" name="returnDate" required>
            </div>

            <input type="submit" value="Ajouter">

        </form>

        <div class="remove-form">
            <h2 class="title">Suppression d'un Prêt</h2>

            <form action="modifyLoanEntry.php" method="post">

                <div class="form-group">
                    <label>ID de Document:</label>
                    <input type="text" name="bookID" required>
                </div>

                <input type="submit" value="Supprimer">
            </form>
        </div>

        <div class="display-link">
            <a href="displayDB.php">Affichage de données</a>
        </div>
    </div>
</body>

</html>



