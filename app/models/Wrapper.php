<?php
namespace App\models;

use Response;

class  Wrapper
{
    protected $result = null;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function query()
    {
        $results = is_array($this->result) ? $this->result : [];
        foreach ($results as &$result) {
            $result = (array) $result;
        }
        unset($result);
        return $results;
    }

    public function get()
    {
        return $this->result;
    }

    public function run()
    {
        return Response::json('', 204);
    }

}
?>