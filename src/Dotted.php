<?php declare(strict_types=1);

namespace PlayingWithProjections;

/**
 * Prints a dot once every 100 events it processes
 */
final class Dotted implements Projector
{
    private Projector $wrappedProjector;

    private $count = 0;

    function __construct(Projector $wrappedProjector)
    {
        $this->wrappedProjector = $wrappedProjector;
    }

    public function project(Event $event): void
    {
        $this->count++;
        if ($this->count == 100) {
            echo '.';
            $this->count = 0;
        }
        $this->wrappedProjector->project($event);
    }
}