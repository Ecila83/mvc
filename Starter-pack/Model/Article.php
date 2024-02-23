<?php

declare(strict_types=1);

class Article
{
    public string $title;
    public ?string $description;
    public ?string $publishDate;
    public string $author;

    public function __construct(string $title, ?string $description, ?string $publishDate, string $author)
    {
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->author = $author;
    }

    public function formatPublishDate($format = 'DD-MM-YYYY')
    {
        // TODO: return the date in the required format
       $publishDate = $this->publishDate;
       $timestamp = strtotime($publishDate);
       $formattedDate = date(str_replace(['DD', 'MM', 'YYYY'], ['d', 'm', 'Y'], $format), $timestamp);
    
        return $formattedDate;
    }
}