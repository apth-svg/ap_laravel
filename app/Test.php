<?php

namespace App;
class Test{
    protected $name;
    public function __constructor()
    {
        $this->name = $name;
    }

    public function execute()
    {
        dd('execute work');
    }
}