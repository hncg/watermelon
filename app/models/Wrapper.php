<?php
namespace APP\models;

class  Wrapper
{
    protected $result = '';

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function query()
    {
        return $this->result;
    }

    public function get()
    {

    }

    public function run()
    {

    }

}
?>