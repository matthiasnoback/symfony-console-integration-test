<?php
declare(strict_types=1);

namespace Demo\Infrastructure;

use Demo\Application\CommandBus;

abstract class AbstractContainer
{
    abstract public function commandBus(): CommandBus;
}
