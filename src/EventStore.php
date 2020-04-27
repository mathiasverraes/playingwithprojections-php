<?php declare(strict_types=1);

namespace PlayingWithProjections;

use JsonCollectionParser\Parser as JSONStream;

final class EventStore
{
    private Projector $projector;

    function __construct(Projector $projector)
    {
        $this->projector = $projector;
    }

    public function replay(string $file) : void
    {
        $projector = $this->projector;
        $f = function (object $json) use($projector) {
            $event = Event::_fromJsonObject($json);
            $projector->project($event);
        };

        (new JSONStream())->parseAsObjects($file, $f);
    }

}