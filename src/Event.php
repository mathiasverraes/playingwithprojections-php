<?php declare(strict_types=1);

namespace PlayingWithProjections;

use DateTimeImmutable;

final class Event
{
    private string $id;
    private string $type;
    private DateTimeImmutable $timestamp;
    private object $payload;

    private function __construct(string $id, string $type, DateTimeImmutable $timestamp, object $payload)
    {
        $this->id = $id;
        $this->type = $type;
        $this->timestamp = $timestamp;
        $this->payload = $payload;
    }

    public static function _fromJsonObject(object $json): Event
    {
        return new Event($json->id, $json->type, new DateTimeImmutable($json->timestamp), $json->payload);
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