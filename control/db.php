<?php
class db
{
    protected $db;
    private $dbname;
    private $dbhost;
    private $dbuser;
    private $dbpass;
    function __construct( $dbname , $dbuser , $dbpass ){
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        try {
            $this->db = new PDO('mysql:host=localhost;'.'dbname='.$this->dbname.';charset=utf8mb4', $this->dbuser, $this->dbpass,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        date_default_timezone_set('Asia/Tehran');
    }
    function change_data($values)
    {
        $new_vals = [];
        if (is_array($values)) {
            foreach ($values as $value) {
                if (is_string($value))
                    $new_vals[] = "'$value'";
                else if ($value === NULL)
                    $new_vals[] = "NULL";
                else
                    $new_vals[] = $value;
            }
        } else {
            if (is_string($values))
                $new_vals[] = "'$values'";
            else if ($values === NULL)
                $new_vals[] = "NULL";
            else
                $new_vals[] = $values;
        }
        return $new_vals;
    }
    function insert($table,$data)
    {
        $sql = "INSERT INTO {$table} (";
        $sql .= implode(", ",array_keys($data));
        $values = array_values($data);
        $sql .= ") VALUES (";
        $sql .= implode(", ", $this->change_data($values));
        $sql .= ');';
        $this->db->exec($sql);
        return $this->db->lastInsertId();
    }
    function update($table,$data,$where){
        $sql = "UPDATE {$table} SET ";
        foreach ($data as $key => $value) {
            $value = $this->change_data($value);
            $sql.= "$key = $value[0]";
        }
        $sql .= " WHERE {$where}";
        return $this->db->exec($sql);
    }
    function delete($table,$where)
    {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        return $this->db->exec($sql);
    }
    function select($table,$where)
    {
        $sql = 'SELECT * FROM '.$table.' WHERE '.$where;
        return $this->db->query($sql)->fetch(PDO::FETCH_OBJ);
    }
    function selects($table, $where = '1=1', $limit = 0, $offset = 0)
    {
        $sql = 'SELECT * FROM '.$table.' WHERE '.$where;
        if ($limit > 0) {
            $sql .= ' LIMIT '.$limit . ' OFFSET '.$offset;
        }
        return $this->db->query($sql)->fetchAll(PDO::FETCH_OBJ);
    }
}