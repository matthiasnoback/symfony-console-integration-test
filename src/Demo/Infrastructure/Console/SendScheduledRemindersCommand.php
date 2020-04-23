<?php
declare(strict_types=1);

namespace Demo\Infrastructure\Console;

use Demo\Application\CommandBus;
use Demo\Application\SendScheduledReminders;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class SendScheduledRemindersCommand extends Command
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        parent::__construct(null);

        $this->commandBus = $commandBus;
    }

    protected function configure()
    {
        $this->setName('send:scheduled-reminders')
            ->addArgument('date', InputArgument::REQUIRED)
            ->addOption('digest', InputOption::VALUE_NONE);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = new SendScheduledReminders(
            $input->getArgument('date'),
            $input->getOption('digest')
        );

        $this->commandBus->handle($command);

        return 0;
    }
}
