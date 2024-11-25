<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
    <title>PHP TP4</title>
</head>
<body>
    <?php include("header.php"); ?>

<main>
    <?php
        //connexion à la BDD
        include("connexion.php");   
        $result = $conn->query("SELECT * FROM articles");
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                echo "<article class='article'>";
                echo "<h2>" . $row["titre"] . "</h2>";
                echo "<p>< " . $row["date"] . " >  Auteur: " . $row["auteur"] . "</p>";
                echo "<p>" . $row["contenu"] . "</p>";
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