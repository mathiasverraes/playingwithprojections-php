<?php declare(strict_types=1);

namespace PlayingWithProjections;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class RunProjection extends Command
{
    protected function configure() : void
    {
        $this->setName("project");
        $this->addArgument("file", InputArgument::REQUIRED, "JSON file with events");
        $this->setDescription('Run projection on a JSON file with events');
    }

    protected function execute(InputInterface $input, OutputInterface $output) : int
    {
        $projector = new CountEvents();

        $eventStore = new EventStore($projector);
        $eventStore->replay($input->getArgument("file"));

        $output->writeln("Number of events:");
        $output->writeln($projector->getState());

        return 0;
    }
}