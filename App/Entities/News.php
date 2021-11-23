<?php

namespace App\Entities;

final class News
{
    private $id;
    private $title;
    private $notice;
    private $date;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }


    public function getNotice(): string
    {
        return $this->notice;
    }

    public function setNotice(string $notice): self
    {
        $this->notice = $notice;
        return $this;
    }
    public function getDate(): string
    {
        return $this->date;
    }


    public function setDate(string $date): self
    {
        $this->date = $date;
        return $this;
    }
}
