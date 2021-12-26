<?php

namespace Curiosity\Application\Service;

use Exception;
use Curiosity\Application\Entity\Command\CommandCollectionFactory;
use Curiosity\Application\Entity\Plateau\PlateauFactory;
use Curiosity\Application\Entity\Rover\RoverCollection;
use Curiosity\Application\Entity\Rover\RoverFactory;
use Curiosity\Application\IO\Input;
use Curiosity\Application\IO\Output;

class Explorer {
    public function run() {
        // Create input and output.
        $input  = new Input(STDIN ?? fopen('php://stdin', 'r'));
        $output = new Output(STDOUT ?? fopen('php://stdout', 'w'));
        try {
            // Read inputs.
            $plateauUpperCoordinate = $input->readLine();
            $plateau                = PlateauFactory::create($plateauUpperCoordinate);
            $rovers                 = new RoverCollection();
            while (true) {
                $roverPosition = $input->readLine();
                if ($roverPosition === '') {
                    break;
                }
                $commandInstructions = $input->readLine();
                if ($commandInstructions === '') {
                    break;
                }
                $rover    = RoverFactory::create($roverPosition);
                $commands = CommandCollectionFactory::create($commandInstructions);
                $rover->setCommands($commands);
                $rovers->append($rover);
            }
            // Execute commands.
            foreach ($rovers as $rover) {
                $rover->execute($plateau);
                $output->writeLine($rover->getStatusString());
            }
        }
        catch (Exception $exception) {
            $output->writeLine(sprintf('Exception : %s', $exception->getMessage()));
        }
    }
}