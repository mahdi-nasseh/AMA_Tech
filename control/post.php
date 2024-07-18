<?php
require_once "../auto_load.php";
class post
{
    private $table = 'post';
    function add($user_id, $title, $thumbnail, $des, $category_id)
    {
        global $DB;
            $result = $DB->insert($this->table, [
                'user_id' => $user_id,
                'title' => $title,
                'thumbnail' => $thumbnail,
                'des' => $des,
                'category_id' => $category_id
            ]);
            return $result;
    }
    function edit($id ,$user_id, $title, $thumbnail, $des, $category_id) {
        global $DB;
        $result = $DB->update($this->table, [
            'user_id' => $user_id,
            'title' => $title,
            'thumbnail' => $thumbnail,
            'des' => $des,
            'category_id' => $category_id
        ], "id = $id");
        return $result;
    }
    function remove($id)
    {
        global $DB;
        return $DB->delete($this->table, "id = $id");
    }
    function select_post($where)
    {
        global $DB;
        return $DB->select($this->table, $where)->fetch(PDO::FETCH_OBJ);
    }
    function select_posts($where = '1=1', $limit = 0, $offset = 0)
    {
        global $DB;
        return $DB->selects($this->table, $where, $limit, $offset)->fetchAll(PDO::FETCH_OBJ);
    }
}