<?php
declare(strict_types=1);

namespace Demo\Infrastructure;

use Demo\Application\CommandBus;

/*
 * This is the container that is used in non-test environments.
 */

final class ProductionContainer extends AbstractContainer
{
    public function commandBus(): CommandBus
    {
        return new class implements CommandBus {
            public function handle(object $command)
            {
                /*
                 * In production we will of course process the command and do the actual work by forwarding the command
                 * object to the designated application service.
                 */
            }
        };
    }
}
