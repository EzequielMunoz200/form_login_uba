<?php


namespace App\Models;

use App\Utils\Database;

class User
{
    /**
     *
     * @var String
     */
    private $firstname;

    /**
     * @var String
     */
    private $lastname;

    /**
     * @var String
     */
    private $email;

    /** 
     * @var String
     */
    private $password;

    /** 
     * @var String
     */
    private $dob;

    /** 
     * @var String
     */
    private $gender;



    /**
     * Get the value of firstname
     *
     * @return  String
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @param  String  $firstname
     *
     * @return  self
     */
    public function setFirstname(String $firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     *
     * @return  String
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @param  String  $lastname
     *
     * @return  self
     */
    public function setLastname(String $lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     *
     * @return  String
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  String  $email
     *
     * @return  self
     */
    public function setEmail(String $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     *
     * @return  String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  String  $password
     *
     * @return  self
     */
    public function setPassword(String $password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of dateOfBirth
     *
     * @return  String
     */
    public function getDob()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set the value of dob
     *
     * 
     *
     * @return  String
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get the value of gender
     *
     * @return  String
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @param  String  $gender
     *
     * @return  self
     */
    public function setGender(String $gender)
    {
        $this->gender = $gender;

        return $this;
    }


    public function insert()
    {

        $pdo = Database::getPDO();

        $request = $pdo->prepare(
            "
        INSERT INTO `user` (
            firstname, 
            lastname, 
            email, 
            password, 
            dob, 
            gender)
            VALUES (
                :firstname, 
                :lastname, 
                :email, 
                :password, 
                :dob, 
                :gender)"
        );

        $request->execute(array(
            ':firstname' => $this->firstname,
            ':lastname' => $this->lastname,
            ':email' => $this->email,
            ':password' => $this->password,
            ':dob' => $this->dob,
            ':gender' => $this->gender
        ));



        if ($request) {
            return true;
        }

        return false;
    }
}
