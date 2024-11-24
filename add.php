<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Add</title>
</head>

<body>
    <?php 
        include('header.php');
        include("connexion.php"); 

        if(isset($_POST["titre"])){
            $titre = $_POST["titre"];
            $contenu = $_POST["contenu"];
            $date = $_POST["date"];
            $auteur = $_POST["auteur"];
            // requete SQL
            $sql = "INSERT INTO articles (titre, contenu, date, auteur) VALUES ('$titre', '$contenu', '$date', '$auteur')";
            if (mysqli_query($conn, $sql)) {
            echo "<section class='info'>ajout d'un article</section>";
            } else {
                echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>

    <main>
        <form method='POST' name='addArticle' id='addForm' class='form'>
            <h2>Ajout d'article</h2>
            <input  type='text' name='titre' placeholder='titre'>
            <input  type='text' name='auteur' placeholder='auteur'>
            <input  type='date' name='date'>
            <textarea name='contenu' placeholder='contenu'></textarea>
            <input type='submit' value='Valider'>
        </form>
    </main>

    <?php include("footer.php"); ?>
</body>
</html>