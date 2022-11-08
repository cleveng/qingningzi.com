<?php

namespace App\Classes;

class Seo
{
    protected string $title;
    protected string $keywords;
    protected string $description;

    public function __construct($title, $keywords, $description)
    {
        $this->title = $title;
        $this->keywords = $keywords;
        $this->description = $description;
    }
}
