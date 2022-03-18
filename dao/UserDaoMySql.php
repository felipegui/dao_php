<?php
require_once 'models/User.php';

class UserDaoMySql implements UserDAO
{

    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function create(User $u)
    {
        $sql = $this->pdo->prepare("INSERT INTO user (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());

        return $u;
    }

    public function readAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM user");

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $user = new User();
                $user->setId($item['id']);
                $user->setNome($item['nome']);
                $user->setEmail($item['email']);

                $array[] = $user;
            }
        }

        return $array;

    }
    public function readById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $data = $sql->fetch();

            $user = new User();
            $user->setId($data['id']);
            $user->setNome($data['nome']);
            $user->setEmail($data['email']);
            return $user;
        } else {
            return false;
        }
    }

    public function readByEmail($email)
    {
        $sql = $this->pdo->prepare("SELECT * from user WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {

            $data = $sql->fetch();

            $user = new User();
            $user->setId($data['id']);
            $user->setNome($data['nome']);
            $user->setEmail($data['email']);

            return $user;

        } else {
            return false;
        }
    }

    public function update(User $u)
    {
        $sql = $this->pdo->prepare("UPDATE user SET nome = :nome, email = :email WHERE id = :id");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();
        return true;
    }

    public function delete($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM user WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        return true;
    }
}
