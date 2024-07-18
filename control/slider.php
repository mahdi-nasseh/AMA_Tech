<?php
require_once "../auto_load.php";
class slider
{
    private $table = 'sliders';
    function add($post_id)
    {
        global $DB;
        $result = $DB->insert($this->table, [
            'post_id' => $post_id,
        ]);
        return $result;
    }
    function edit($id ,$post_id, $active = 0) {
        global $DB;
        $result = $DB->update($this->table, [
            'post_id' => $post_id,
            'active' => $active,
        ], "id = $id");
        return $result;
    }
    function remove($id)
    {
        global $DB;
        return $DB->delete($this->table, "id = $id");
    }
    function select_slider($where)
    {
        global $DB;
        return $DB->select($this->table, $where)->fetch(PDO::FETCH_OBJ);
    }
    function select_sliders($where = '1=1', $limit = 0, $offset = 0)
    {
        global $DB;
        return $DB->selects($this->table, $where, $limit, $offset)->fetchAll(PDO::FETCH_OBJ);
    }
}