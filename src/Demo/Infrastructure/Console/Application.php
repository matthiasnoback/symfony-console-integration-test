<?php
declare(strict_types=1);

namespace Demo\Infrastructure\Console;

use Demo\Infrastructure\Kernel;
use Symfony\Component\Console\Application as SymfonyConsoleApplication;
use Symfony\Component\Console\Input\InputOption;

final class Application extends SymfonyConsoleApplication
{
    public function __construct(Kernel $kernel)
    {
        parent::__construct();

        // Register commands, inject dependencies
        $this->add(
            new SendScheduledRemindersCommand($kernel->container()->commandBus())
        );

        // Copied from Symfony FrameworkBundle's Application class constructor
        $inputDefinition = $this->getDefinition();
        $inputDefinition->addOption(
            new InputOption(
                '--env',
                '-e',
                InputOption::VALUE_REQUIRED,
                'The Environment name.',
                $kernel->getEnvironment()
            )
        );
        $inputDefinition->addOption(
            new InputOption(
                '--no-debug',
                null,
                InputOption::VALUE_NONE,
                'Switches off debug mode.'
            )
        );
    }
}
