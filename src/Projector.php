<?php declare(strict_types=1);

namespace PlayingWithProjections;

interface Projector
{
    public function project(Event $event) : void;
}