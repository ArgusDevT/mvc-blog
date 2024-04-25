<?php
namespace app\interfaces;

/**
*|-----------------------------------------------------------------
*|  @param interface_userInterface
*|  Реализация интерфесай sendCode
*|-----------------------------------------------------------------
**/

interface userInterface
{
    public function getId():                                    int;
    public function getEmail():                                 string;
    public function getLogin():                                 string;

    public function createSession();
}

/**
*|-----------------------------------------------------------------
*|  @param class_sendCode
*|  Класс отпарвки кода
*|-----------------------------------------------------------------
**/

class userUI implements userInterface
{
    private $id;
    private $login;
    private $email;
    private $password;

    function __construct
    (
        $id, 
        $login,
        $email, 
        $password
    )
    {
        $this->id = $id;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getLogin(): string {
        return $this->login;
    }


    public function createSession()
    {
        SessionUI::set("Auth", true);
        SessionUI::set("id", $this->id);
        SessionUI::set("login", $this->login);
        SessionUI::set("email", $this->email);
        SessionUI::set("password", $this->password);
    }

}