<?php
if (strstr($_SERVER['REQUEST_URI'],'panel'))
    require_once "../../auto_load.php";
else
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
    function  add_like($user_id, $post_id)
    {
        global $DB;
        return $DB->insert('`like`', [
            'user_id' => $user_id,
            'post_id' => $post_id
        ]);
    }
    function remove_like($user_id, $post_id){
        global $DB;
        return $DB->delete('`like`', "user_id = $user_id AND post_id = $post_id");
    }
    function select_post_likes($post_id)
    {
        global $DB;
        return $DB->selects('`like`', "post_id = $post_id")->fetchAll(PDO::FETCH_OBJ);
    }
    function select_user_likes($user_id){
        global $DB;
        return $DB->select('`like`', "user_id = $user_id")->fetchAll(PDO::FETCH_OBJ);
    }
    function add_view($post_id)
    {
        global $DB;
        $views = $DB->select($this->table, 'id ='.$post_id)->fetchAll(PDO::FETCH_OBJ)[0]->views + 1;
        return $DB->update($this->table, ['views' => $views], "id = $post_id");
    }
    function select_views($post_id){
        global $DB;
        return $DB->select($this->table, "id = $post_id")->fetchAll(PDO::FETCH_OBJ)[0]->views;
    }
}