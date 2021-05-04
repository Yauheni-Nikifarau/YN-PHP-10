<?php
trait articlesTable {
    public function getCategories () {
        $sql = "SELECT *
                FROM categories";
        $res = $this->db->query($sql);
        if ($res !== false) {
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function articlesSelection (array $options = []) {
        $where = '';
        if (isset($options['code']) || isset($options['categoryCode'])) {
            $where = 'WHERE ';
            $whereOptions = [];
            if (isset($options['code'])) {
                $whereOptions[] = "post_code = '{$options['code']}'";
            }
            if (isset($options['categoryCode'])) {
                $whereOptions[] = "category_code = '{$options['categoryCode']}'";
            }
            $where .= implode(' AND ', $whereOptions);
        }
        $page = $options['page'] ?? '1';
        $page = (int) $page;
        $offset = 6 * ($page - 1);
        $offset = (string) $offset;
        $sql = "SELECT *
                FROM posts JOIN categories
                ON posts.category_id = categories.id
                $where
                ORDER BY date DESC
                LIMIT 6
                OFFSET $offset";
        $res = $this->db->query($sql);
        if ($res !== false) {
            return $res->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
}