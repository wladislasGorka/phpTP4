<?php
function supprimerArticle($conn, $id) {
    $id = mysqli_real_escape_string($conn, $id);
    $sql = "DELETE FROM articles WHERE id='$id'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Article supprimé avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>