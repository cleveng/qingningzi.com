<?php

namespace App\Classes;

class Medium
{
    protected string $display_name;
    protected string $display_url;

    public function __construct($display_name, $display_url)
    {
        $this->display_name = $display_name;
        $this->display_url = $display_url;
    }
}
