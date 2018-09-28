<?php

include_once ROOT.'/applications/models/BlogModel.php';
class BlogController
{
    public function actionList() {
        $articleList = aray();
        $articleList = BlogModel::getArticleList();

        require_once(ROOT."/applications/views/blogView.php");

        return true;
    }
    public function actionArticle($category, $id) {
        $articleItem = BlogModel::getArticleById($id);
        return true;
    }
}