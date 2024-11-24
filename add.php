<!-- connexion à la BDD -->
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
    echo "ajout d'un article";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>


<form method='POST' name='addArticle'>
    <input  type='text' name='titre' placeholder='titre'>
    <input  type='text' name='auteur' placeholder='auteur'>
    <input  type='date' name='date'>
    <textarea name='contenu' placeholder='contenu'></textarea>
    <input type='submit' value='Valider'>
</form>