<?php 

class Page {
    private $db;

    public function __construct() {
        $this ->  db = new Database;
    }

    public function Register($data) {
        $this -> db -> query('INSERT INTO users (emailPhone, email, number, password) 
            VALUES (:emailPhone, :email, :number, :password)');
        // Bind values
        $this -> db -> bind(':emailPhone', $data['emailPhone']);
        $this -> db -> bind(':email', $data['email']);
        $this -> db -> bind(':number', $data['number']);
        $this -> db -> bind(':password', $data['password']);

        //Excute
        if ($this -> db -> execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email) {
        $this -> db -> query('SELECT * FROM users WHERE email = :email');
        $this -> db -> bind(':email', $email);

        $row = $this -> db -> single();

        // check row
        if ($this -> db -> rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findUserByNumber($number) {
        $this -> db -> query('SELECT * FROM users WHERE number = :number');
        $this -> db -> bind(':number', $number);

        $row = $this -> db -> single();

        //check row
        if ($this -> db -> rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findnonUsers($email) {
        $this -> db -> query("SELECT * FROM users WHERE email = :email");
        $this -> db -> bind(':email', $email);

        $row = $this -> db -> single();

        //check row
        if ($this -> db -> rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function findReferral() {
    }

    
}