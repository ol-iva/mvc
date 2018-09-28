<?php

class BlogModel
{
    public static function getArticleById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            var_dump($db);
            $result = $db->query("SELECT * FROM articles WHERE id=".$id);

            //$result->setFetchMode(PDO::FETCH_NUM);
            //$result->setFetchMode(PDO::FETCH_ASSOC);

            $articleItem = $result->fetch();
            return $articleItem;
        }

    }
    public static function getArticleList()
    {
     //запрос к базе данных
        $db = Db::getConnection();
        $articleList = array();

        $result = $db->query('SELECT id, title, content, category FROM articles ORDER BY id DESC LIMIT 5');
        //$result = $db->query('SELECT * FROM `articles`');
        var_dump($result);

        $i = 0;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $articleList[$i]['id'] = $row['id'];
            $articleList[$i]['title'] = $row['title'];
            $articleList[$i]['content'] = $row['content'];
            //$articleList[$i]['date'] = $row['date'];
            $articleList[$i]['category'] = $row['category'];
            $i++;
        }
        return $articleList;
    }
}