<?php

interface UserDAO {
    //CRUD
    public function create(User $u);

    public function readAll();
    public function readById($id);
    public function readByEmail($email);

    public function update(User $u);
    
    public function delete($id);

}

class User
{

    private $id;
    private $nome;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = trim($id);
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = ucwords(trim($nome));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = strtolower(trim($email));
    }
}
