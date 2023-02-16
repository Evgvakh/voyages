<?php
try {
    $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

$sql = "SELECT * FROM commentaires";
$req = $pdo->prepare($sql);
$req->execute();
$res = $req->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);
?>