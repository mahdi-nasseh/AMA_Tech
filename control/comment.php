<?php
require_once "../auto_load.php";
class comment
{
    private $table = 'comment';
    function add($post_id, $user_id, $content, $reply = 0)
    {
        global $DB;
        $result = $DB->insert($this->table, [
            'post_id' => $post_id,
            'user_id' => $user_id,
            'content' => $content,
            'reply' => $reply,
        ]);
        return $result;
    }
    function edit($id, $post_id, $user_id, $content, $reply = 0) {
        global $DB;
        $result = $DB->update($this->table, [
            'post_id' => $post_id,
            'user_id' => $user_id,
            'content' => $content,
            'reply' => $reply,
        ], "id = $id");
        return $result;
    }
    function remove($id)
    {
        global $DB;
        return $DB->delete($this->table, "id = $id");
    }
    function select_comment($where)
    {
        global $DB;
        return $DB->select($this->table, $where)->fetch(PDO::FETCH_OBJ);
    }
    function select_comments($where = '1=1', $limit = 0, $offset = 0)
    {
        global $DB;
        return $DB->selects($this->table, $where, $limit, $offset)->fetchAll(PDO::FETCH_OBJ);
    }
    function accept($id)
    {
        global $DB;
        $result = $DB->update($this->table, [
            'status' => 1,
        ], "id = $id");
        return $result;
    }
    function deAccept($id){
        global $DB;
        $result = $DB->update($this->table, [
            'status' => 0,
        ], "id = $id");
    }
    function is_accept($id){
        global $DB;
        $result = $DB->select($this->table, "id = $id AND status = 1");
        return count($result) > 0;
    }
}