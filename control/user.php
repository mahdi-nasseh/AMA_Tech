<?php
include 'db.php';

class user extends db
{
    private $table = 'user';

    function login($username, $password = 0)
    {
        if ($password == 0)
            $result = $this->select($this->table, "username='$username'")->fetch(PDO::FETCH_OBJ);
        else
            $result = $this->select($this->table, "username='$username' and password='$password'")->fetch(PDO::FETCH_OBJ);
        if ($result)
            return $result->id;
        else
            return false;
    }

    function register($name, $username, $password, $mobile, $email)
    {
        $has_username = $this->select($this->table, "username='$username'")->fetch(PDO::FETCH_OBJ);
        $has_mobile = $this->select($this->table, "mobile='$mobile'")->fetch(PDO::FETCH_OBJ);
        $has_email = $this->select($this->table, "email='$email'")->fetch(PDO::FETCH_OBJ);
        $err_alert = [];
        if ($has_username || $has_mobile || $has_email) {
            if ($has_username)
                array_push($err_alert, "Username");
            if ($has_mobile)
                array_push($err_alert, "Mobile");
            if ($has_email)
                array_push($err_alert, "Email");
        }
        if (!$err_alert) {
            return $this->insert($this->table, [
                'name' => $name,
                'username' => $username,
                'password' => $password,
                'mobile' => $mobile,
                'email' => $email,
                'register_date' => date("Y-m-d")
            ]);
        } else {
            return implode(" and ", $err_alert) . ' already taken.';
        }
    }

    function edit($id, $name, $username, $password, $mobile, $email)
    {
        return $this->update($this->table, [
            'name' => $name,
            ' username' => $username,
            ' password' => $password,
            ' mobile' => $mobile,
            ' email' => $email,
        ], "id = $id");
    }
}