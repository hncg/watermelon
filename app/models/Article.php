<?php
namespace APP\models;

class Article extends Model
{

    public function query()
    {
        $articles = (new Factory('bps'))->with()->call('mget_blog')->query();
        $articleConmentsMap = (new Factory('bps'))->with($parent_ids = [1])->call('get_comment_map_by_parent_ids')->query();
        foreach ($articles as &$article) {
            $article['comment'] = (array) $articleConmentsMap[$article['id']];
        }
        unset($article);
        return json_encode($articles);
    }
}
?>