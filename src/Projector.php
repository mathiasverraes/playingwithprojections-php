<?php declare(strict_types=1);

namespace PlayingWithProjections;

interface Projector
{
    function project(Event $event) : void;
}