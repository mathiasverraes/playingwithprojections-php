<?php declare(strict_types=1);

namespace PlayingWithProjections;

use DateTimeImmutable;

final class Event
{
    private string $id;
    private string $type;
    private DateTimeImmutable $timestamp;
    private object $payload;

    private function __construct()
    {
    }

    public static function _fromJsonObject(object $json): Event
    {
        $event = new Event();
        $event->id = $json->id;
        $event->type = $json->type;
        $event->timestamp = new DateTimeImmutable($json->timestamp);
        $event->payload = $json->payload;

        return $event;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function timestamp(): DateTimeImmutable
    {
        return $this->timestamp;
    }

    public function payload(): object
    {
        return $this->payload;
    }

}