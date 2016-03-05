<?php
namespace App\models;

use bps\Query;

class Article extends Model
{

    public function query($user, $limit = 10, $offset = 0)
    {
        $articles = (new Factory('bps'))->with([new Query(['user_id' => $user->id, 'limit' => $limit, 'offset' => $offset])])->call('mget_blog')->query();
        $parent_ids = [];
        foreach ($articles as $article) {
            array_push($parent_ids, $article['id']);
        }
        $articleConmentsMap = (new Factory('bps'))->with(['parent_ids' => $parent_ids])->call('get_comment_map_by_parent_ids')->query();
        foreach ($articles as &$article) {
            $article['comment'] = empty($articleConmentsMap[$article['id']]) ? [] : $articleConmentsMap[$article['id']];
        }
        return json_encode($articles);
    }


    public function story($user, $article)
    {
        return (new Factory('bps'))->with([new \bps\Article([
            'title' => $article['title'],
            'content' => $article['content'],
            'time' => time(),
            'author' => $article['author'],
            'user_id' => $user->id
        ])])->call('add')->run();
    }
}

?>