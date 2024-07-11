<?php
require_once '../auto_load.php';
class user{
    private $table = 'user';
    function login($username, $password = 0) {
        global $DB;
        if ($password == 0)
            $result = $DB->select($this->table, "username='$username'")->fetch(PDO::FETCH_OBJ);
        else
            $result = $DB->select($this->table, "username='$username' and password='$password'")->fetch(PDO::FETCH_OBJ);
        if ($result)
            return $result->id;
        else
            return false;
    }
    function register($name, $username, $password, $email)
    {
        global $DB;
        $has_username = $DB->select($this->table, "username='$username'")->fetch(PDO::FETCH_OBJ);
        $has_email = $DB->select($this->table, "email='$email'")->fetch(PDO::FETCH_OBJ);
        $err_alert = [];
        if ($has_username || $has_email) {
            if ($has_username)
                array_push($err_alert, "Username");
            if ($has_email)
                array_push($err_alert, "Email");
        }
        if (!$err_alert) {
            $result = $DB->insert($this->table, [
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
        global $DB;
        $result = $DB->update($this->table, [
            'name' => $name,
            ' username' => $username,
            ' password' => $password,
            ' mobile' => $mobile,
            ' email' => $email,
        ], "id = $id");
        return $result;
    }
    function remove($id){
        global $DB;
        return $DB->delete($this->table, "id = $id");
    }
    function select_user($where)
    {
        global $DB;
        return $DB->select($this->table, $where)->fetch(PDO::FETCH_OBJ);
    }
    function select_users($where = '1=1', $limit = 0, $offset = 0)
    {
        global $DB;
        return $DB->selects($this->table, $where, $limit, $offset)->fetchAll(PDO::FETCH_OBJ);
    }
}