<?php
require_once '../auto_load.php';
class user extends db {
    private $table = 'user';
    function login($username, $password = 0) {
        if ($password == 0)
            $result = $this->select($this->table, "username='$username'")->fetch(PDO::FETCH_OBJ);
        else
            $result = $this->select($this->table, "username='$username' and password='$password'")->fetch(PDO::FETCH_OBJ);
        if ($result)
            return $result->id;
        else
            return false;
    }
    function register($name, $username, $password, $email)
    {
        $has_username = $this->select($this->table, "username='$username'")->fetch(PDO::FETCH_OBJ);
        $has_email = $this->select($this->table, "email='$email'")->fetch(PDO::FETCH_OBJ);
        $err_alert = [];
        if ($has_username || $has_email) {
            if ($has_username)
                array_push($err_alert, "Username");
            if ($has_email)
                array_push($err_alert, "Email");
        }
        if (!$err_alert) {
            $result = $this->insert($this->table, [
                'name' => $name,
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'register_date' => date("Y-m-d")
            ]);
            return $result;
        } else {
            return implode(" and ", $err_alert) . ' already taken.';
        }
    }
    function edit($id, $name, $username, $password, $mobile, $email) {
        $result = $this->update($this->table, [
            'name' => $name,
            ' username' => $username,
            ' password' => $password,
            ' mobile' => $mobile,
            ' email' => $email,
        ], "id = $id");
        return $result;
    }
    function remove($id){
        return $this->delete($this->table, "id = $id");
    }
    function select_user($where)
    {
        return $this->select($this->table, $where)->fetch(PDO::FETCH_OBJ);
    }
    function select_users($where = '1=1', $limit = 0, $offset = 0)
    {
        return $this->selects($this->table, $where, $limit, $offset)->fetchAll(PDO::FETCH_OBJ);
    }
}