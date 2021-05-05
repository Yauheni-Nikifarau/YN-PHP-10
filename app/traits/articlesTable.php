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
                $whereOptions[] = "posts.id = '{$options['code']}'";
            }
            if (isset($options['categoryCode'])) {
                $whereOptions[] = "category_code = '{$options['categoryCode']}'";
            }
            $where .= implode(' AND ', $whereOptions);
        }
        $page = $options['page'] ?? '1';
        $page = (int) $page;
        $offset = $GLOBALS['limit'] * ($page - 1);
        $offset = (string) $offset;
        $sql = "SELECT posts.id, title, post_code, content, date, categories.name, category_code, authors.name AS 'author'
                FROM posts 
                INNER JOIN categories ON posts.category_id = categories.id
                INNER JOIN authors ON posts.author_id = authors.id
                $where
                ORDER BY date DESC
                LIMIT {$GLOBALS['limit']}
                OFFSET $offset";
        $res = $this->db->query($sql);
        if ($res !== false) {
            $posts = $res->fetchAll(PDO::FETCH_ASSOC);
            foreach ($posts as $k => $post) {
                $posts[$k]['furl'] = toFriendlyUrl(mb_substr($post['title'], 0, 20)) . '_' . $post['id'];
            }
            return $posts;
        }
        return false;
    }
}
