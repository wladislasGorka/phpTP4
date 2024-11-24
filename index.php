<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP TP4</title>
</head>
<body>
    <?php include("header.php"); ?>

<main>
    <!-- connexion à la BDD -->
    <?php
        include("connexion.php");   
        $result = $conn->query("SELECT * FROM articles");
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<article class='article'>";
                echo "<p>Titre: " . $row["titre"] . "</p>";
                echo "<p>date : " . $row["date"] . " - Auteur: " . $row["auteur"] . "</p>";
                echo "<p>contenu : " . $row["contenu"] . "</p>";
                echo "</article>";
            }
        }else{
            echo "0 résultats";
        }
    ?>
</main>

    <?php include("footer.php"); ?>
</body>
</html>