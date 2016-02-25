<?php
namespace APP\models;

class Article extends Model
{

    public function query()
    {
        $article = (new Factory('bps'))->call('mget_blog')->query();

        var_dump($article);

        $articleConment = (new Factory('bps'))->call('mget_comment')->query();

        var_dump($articleConment);

    }
}
?>