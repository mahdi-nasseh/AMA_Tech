<?php
require_once "../auto_load.php";
class category
{
    private $table = 'category';
    function add($name)
    {
        global $DB;
        $result = $DB->insert($this->table, [
            'name' => $name
        ]);
        return $result;
    }
    function edit($id,$name) {
        global $DB;
        $result = $DB->update($this->table, [
            'name' => $name
        ], "id = $id");
        return $result;
    }
    function remove($id)
    {
        global $DB;
        return $DB->delete($this->table, "id = $id");
    }
    function select_category($where)
    {
        global $DB;
        return $DB->select($this->table, $where)->fetch(PDO::FETCH_OBJ);
    }
    function select_categories($where = '1=1', $limit = 0, $offset = 0)
    {
        global $DB;
        return $DB->selects($this->table, $where, $limit, $offset)->fetchAll(PDO::FETCH_OBJ);
    }
}