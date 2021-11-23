<?php

namespace App\Entities;

final class Event
{
    private $id;
    private $title;
    private $desc;
    private $date_event;
    private $hour_event;

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

    public function getDateEvent(): string
    {
        return $this->date_event;
    }

    public function setDateEvent(string $date_event): self
    {
        $this->date_event = $date_event;
        return $this;
    }

    public function getHourEvent(): string
    {
        return $this->hour_event;
    }

    public function setHourEvent(string $hour_event): self
    {
        $this->hour_event = $hour_event;
        return $this;
    }

    public function getDesc(): string
    {
        return $this->desc;
    }

    public function setDesc(string $desc): self
    {
        $this->desc = $desc;
        return $this;
    }
}
