<?php
namespace APP\models;

class Article extends Model
{

    public function query()
    {
        return (new Factory('bps'))->call('mget_blog')->query();
    }
}
?>