<?php
declare(strict_types=1);

namespace Demo\Infrastructure;

use Demo\Application\CommandBus;

/*
 * This container overrides some of the services in the AbstractContainer
 */

final class IntegrationTestContainer extends AbstractContainer
{
    public function commandBus(): CommandBus
    {
        return new class implements CommandBus {
            public function handle(object $command)
            {
                /*
                 * When running the app in test environment, this will make the contents of the command show up in the
                 * CLI command output, so we can find out the exact command object that the console command provided to
                 * the command bus.
                 */
                var_dump($command);
            }
        };
    }
}
