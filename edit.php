<!DOCTYPE html>
<html lang="en">
<head></head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>
<body>
<?php
include('header.php');
?>
<main>
<?php
include("connexion.php");
include("delete.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $titre = mysqli_real_escape_string($conn, $_POST["titre"]);
    $contenu = mysqli_real_escape_string($conn, $_POST["contenu"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $auteur = mysqli_real_escape_string($conn, $_POST["auteur"]);

    // Requête SQL pour mettre à jour l'article
    $sql = "UPDATE articles SET titre='$titre', contenu='$contenu', date='$date', auteur='$auteur' WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "<section class='info'>Mise à jour réussie</section>";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}
 
//requete SQL
$result = $conn->query("SELECT * FROM articles");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<article id='" . $row["id"] . "' class='article'>";
        echo "<p>Titre: " . $row["titre"] . "</p>";
        echo "<p>Date : " . $row["date"] . " - Auteur: " . $row["auteur"] . "</p>";
        echo "<p>Contenu : " . $row["contenu"] . "</p>";
        echo "<button onclick='modifArticle(\"" . $row["id"] . "\", \"" . $row["titre"] . "\", \"" . $row["date"] . "\", \"" . $row["auteur"] . "\", \"" . $row["contenu"] . "\")' name='modifier'>Modifier</button>";
        echo "<form method='post' action='delete.php' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='supprimer' value='Supprimer'>";
        echo "</form>";
        echo "</article>";
    }
}else{
    echo "0 résultats";
}

?>

<script>
    function modifArticle(id, titre, date, auteur, contenu) {
        console.log(id, titre, date, auteur, contenu);
        document.getElementById("modifId").value = id;
        document.getElementById("modifTitre").value = titre;
        document.getElementById("modifDate").value = date;
        document.getElementById("modifAuteur").value = auteur;
        document.getElementById("modifContenu").value = contenu;
    }
</script>

<form method='post' id='modifForm' class='form'>
    <h2>Modification d'article</h2>
    <input id='modifId' type="hidden" name='id'>
    <input id='modifTitre' type='text' name='titre' required>
    <input id='modifAuteur' type='text' name='auteur' required>
    <input id='modifDate' type='date' name='date' required>    
    <textarea id='modifContenu' name='contenu' required></textarea>
    <input type='submit' value='valider'>
</form>
</main>
<?php
include('footer.php');
?>
</body>
</html>