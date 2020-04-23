<?php
declare(strict_types=1);

namespace Demo\Application;

use DateTimeImmutable;

final class SendScheduledReminders
{
    /**
     * @var string
     */
    private $dueDate;

    /**
     * @var bool
     */
    private $createDigestEmails;

    public function __construct(string $dueDate, bool $createDigestEmails)
    {
        $this->dueDate = $dueDate;
        $this->createDigestEmails = $createDigestEmails;
    }

    public function dueDate(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->dueDate);
    }

    public function createDigestEmails(): bool
    {
        return $this->createDigestEmails;
    }
}
