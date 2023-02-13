<?php
class AccountModel
{
    public function addUser($login, $email, $password, $role)
    {
        try {
            $pdo = new PDO("mysql:host=localhost; dbname=blog_voyages", 'root', '');
        } catch (PDOException $e) {
            die("Erreur : " . $e->getMessage());
        }

        $sql = "INSERT INTO utilisateurs (login, password, email, role) VALUES (:login, :password, :email, :role)";
        $req = $pdo->prepare($sql);
        $req->execute(array('login' => $login, 'password' => $password, 'email' => $email, 'role' => $role));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>