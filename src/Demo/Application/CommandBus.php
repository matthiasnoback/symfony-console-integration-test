<?php
declare(strict_types=1);

namespace Demo\Application;

interface CommandBus
{
    /**
     * @return mixed
     */
    public function handle(object $command);
}
