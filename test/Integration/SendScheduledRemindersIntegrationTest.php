<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class SendScheduledRemindersIntegrationTest extends TestCase
{
    /**
     * @test
     */
    public function the_date_argument_is_required(): void
    {
        $process = new Symfony\Component\Process\Process(
            [
                'bin/console',
                'send:scheduled-reminders',
                '--env=test'
            ]
        );
        $process->run();

        self::assertFalse($process->isSuccessful());

        self::assertStringContainsString('Not enough arguments (missing: "date").', $process->getErrorOutput());
    }

    /**
     * @test
     */
    public function it_can_send_scheduled_reminders_for_a_given_date(): void
    {
        $process = new Symfony\Component\Process\Process(
            [
                'bin/console',
                'send:scheduled-reminders',
                '2020-04-23',
                '--env=test'
            ]
        );
        $process->run();

        self::assertTrue($process->isSuccessful());

        $expected = <<<'EOD'
class Demo\Application\SendScheduledReminders#24 (2) {
  private $dueDate =>
  string(10) "2020-04-23"
  private $createDigestEmails =>
  bool(false)
}
EOD;

        self::assertStringContainsString($expected, $process->getOutput());
    }

    /**
     * @test
     */
    public function it_can_optionally_send_digest_mails(): void
    {
        $process = new Symfony\Component\Process\Process(
            [
                'bin/console',
                'send:scheduled-reminders',
                '2020-04-23',
                '--digest',
                '--env=test'
            ]
        );
        $process->run();

        self::assertTrue($process->isSuccessful());

        $expected = <<<'EOD'
class Demo\Application\SendScheduledReminders#24 (2) {
  private $dueDate =>
  string(10) "2020-04-23"
  private $createDigestEmails =>
  bool(true)
}
EOD;

        self::assertStringContainsString($expected, $process->getOutput());
    }
}
