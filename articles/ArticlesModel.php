<?php
require ROOT . '/app/classes/Model.php';
require ROOT . '/app/traits/articlesTable.php';

class ArticlesModel extends Model
{
    use articlesTable;

    public function getPageData () {
        $pageData['title'] = 'Категории';
        $pageData['categories'] = $this->getCategories();

        return $pageData;
    }

    public function getCategoryPosts ($code, $page = 1) {
        $pageData['articles'] = $this->articlesSelection(['categoryCode' => $code, 'page' => $page]);
        $pageData['title'] = $pageData['articles'][0]['name'];
        $pageData['pages'] = ceil($this->categoryPostsAmount($code) / $GLOBALS['limit']);

        return $pageData;
    }

    public function getPostData ($code) {
        $pageData['post'] = $this->articlesSelection(['code' => $code])[0];
        $pageData['title'] = $pageData['post']['title'];

        return $pageData;
    }

    protected function categoryPostsAmount ($code) {
        $sql = "SELECT COUNT(posts.id)
                FROM posts JOIN categories
                ON posts.category_id = categories.id
                WHERE category_code = '$code'";
        $res = $this->db->query($sql);
        if ($res !== false) {
            return (int) $res->fetch()[0];
        }
        return false;
    }
}