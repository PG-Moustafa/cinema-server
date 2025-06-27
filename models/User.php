<?php

require_once("Model.php");

class User extends Model
{

    protected ?int $id;
    protected string $name;
    protected string $email;
    protected string $phone;
    protected string $password_hash;
    protected string $birthdate;

    public function __construct(array $data)
    {
        $this->id = $data["id"] ?? null;
        $this->name = $data["name"] ?? '';
        $this->email = $data["email"] ?? '';
        $this->phone = $data["phone"] ?? '';
        $this->password_hash = $data["password_hash"] ?? '';
        $this->birthdate = $data["birthdate"] ?? '';
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPassword_Hash(): string
    {
        return $this->password_hash;
    }

    public function getBirthday(): string
    {
        return $this->birthdate;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword_Hash(string $password_hash)
    {
        $this->password_hash = $password_hash;
    }
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }
    public function setBirthdate(string $birthdate)
    {
        $this->birthdate = $birthdate;
    }

    public function toArray()
    {
        $data = [
            "name" => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "password_hash" => $this->password_hash,
            "birthdate" => $this->birthdate
        ];

        if (isset($this->id)) {
            $data["id"] = $this->id;
        }

        return $data;
    }



}
