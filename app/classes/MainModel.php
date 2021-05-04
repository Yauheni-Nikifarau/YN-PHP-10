<?php
include_once ROOT . '/app/classes/Model.php';
include_once ROOT . '/app/traits/articlesTable.php';
class MainModel extends Model {


    public function getPageData () {
        $pageData['title'] = 'Главная страница';
        $pageData['articles'] = $this->articlesSelection();

        return $pageData;
    }

    use articlesTable;
}