<?php declare(strict_types=1);

namespace PlayingWithProjections;

final class CountEvents implements Projector
{
    private int $count = 0;

    public function project(Event $event): void
    {
        $this->count++;
    }

    public function getState(): int
    {
        return $this->count;
    }
}