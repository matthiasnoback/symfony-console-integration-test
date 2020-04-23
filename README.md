This project is a demo of an integration test (see [SendScheduledRemindersIntegrationTest.php])(test/Integration/SendScheduledRemindersIntegrationTest.php) for a Symfony console command (see [SendScheduledRemindersCommand.php](src/Demo/Infrastructure/Console/SendScheduledRemindersCommand.php).

It uses `symfony/process` to run one of the application's console commands as if it were an actual user running it in their terminal.
In the test environment the command bus has been replaced with an implementation that doesn't actually handle a command, but only dumps the command to `stdout`.
The test then inspects the output and checks that the right command was dispatched based on the provided command-line arguments and options.

