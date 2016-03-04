<?php
namespace App\models;

use Response;

class Comment extends Model
{

    public function story($user_id, $parent_id, $content, $time, $user_niker)
    {
        return (new Factory('bps'))->with([new \bps\Comment([
            'content' => $content,
            'time_at' => $time,
            'user_niker' => $user_niker,
            'user_id' => $user_id,
            'parent_id' => $parent_id
        ])])->call('add_comment')->run();
    }
}

?>