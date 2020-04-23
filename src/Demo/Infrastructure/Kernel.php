<?php
declare(strict_types=1);

namespace Demo\Infrastructure;

/*
 * This is just here to mimics the Symfony Kernel somewhat, keep track of the env and debug parameters, and keep
 * a service container instance.
 */

final class Kernel
{
    /**
     * @var string
     */
    private $env;

    /**
     * @var bool
     */
    private $debug;

    /**
     * @var IntegrationTestContainer
     */
    private $container;

    public function __construct(string $env, bool $debug)
    {
        $this->env = $env;
        $this->debug = $debug;

        if ($env === 'test') {
            $this->container = new IntegrationTestContainer();
        } else {
            $this->container = new ProductionContainer();
        }
    }

    public function container(): AbstractContainer
    {
        return $this->container;
    }

    public function getEnvironment(): string
    {
        return $this->env;
    }
}
