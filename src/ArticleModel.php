<?php


namespace App;


class ArticleModel
{

    /**
     * функция возвращает масив статей
     * @return array
     */
    public function getArticles(): array
    {
        return json_decode(file_get_contents('db/articles.json'), true);
    }

    /**
     * функция возвращает статью  в виде масива по id
     * @param int $id
     * @return array
     */

    public function getArticleById(int $id): array
    {
        $articleList = $this->getArticles();
        $curentArticle = [];
        if (array_key_exists($id, $articleList)) {
            $curentArticle = $articleList[$id];
        }
        return $curentArticle;
    }

}