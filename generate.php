<?php

declare(strict_types=1);

use Ghostwriter\Filesystem\Filesystem;
use Ghostwriter\Shell\Shell;

require 'vendor/autoload.php';

$filesystem = Filesystem::new();
$shell = Shell::new();

$workspace = __DIR__;
$command = 'vendor/bin/phpbench';
$arguments = ['run', '--report', 'aggregate', '--iterations', '2', '--revs', '1000000'];

echo \sprintf("Running command: %s %s\n", $command, \implode(' ', $arguments));

$result = $shell->execute('vendor/bin/phpbench', $arguments);

$exitCode = $result->exitCode();
$stdout = \mb_trim($result->stdout());
$stderr = \mb_trim($result->stderr());

if (0 === $exitCode) {
    echo \sprintf("Command succeeded: %s %s\n", $command, \implode(' ', $arguments));

    echo "\nSTDOUT:\n";
    echo $stdout;

    if ('' !== $stderr) {
        echo "\n\nSTDERR:\n";
        echo $stderr;
    }

    $lines = [
        '# empty-vs-strict-benchmark',
        '',
        'This benchmark compares the performance of using `empty()` versus strict comparisons (like `[] === $x`) in PHP.',
        '',
        '## Benchmark Results',
        '',
        '```',
        $stdout,
        '```',
        '',
        '## Command',
        '',
        'This benchmark was run using the following command:',
        '',
        '```bash',
        $command . ' ' . \implode(' ', $arguments),
        '```',
        '',
        '## Notes',
        '',
        'The results are aggregated to provide an overall performance comparison.',
        '',
        'For more details, please refer to the [PHPBench documentation](https://github.com/phpbench/phpbench).',
    ];

    $markdown = \implode("\n", $lines) . "\n";

    $filesystem->write($workspace . \DIRECTORY_SEPARATOR . 'README.md', $markdown);

    exit($exitCode);
}

throw new \RuntimeException(\implode("\n", [
    'Command failed with exit code: ' . $exitCode,
    'STDOUT: ',
    $stdout,
    'STDERR: ',
    $stderr,
]));
