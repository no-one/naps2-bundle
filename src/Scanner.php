<?php
namespace noone\NAPS2Bundle;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Provides access to the CLI commands (see https://www.naps2.com/doc/command-line).
 */
class Scanner
{
    private array $command = [];

    /**
     * @param string $path Path to the NAPS2 executable
     */
    public function __construct(string $path)
    {
        $this->command[] = $path;
    }

    /**
     * Start the scanning process.
     */
    public function run()
    {
        $process = new Process($this->command);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return new ScanResult($process->getOutput(), $process->getErrorOutput());
    }

    /**
     * Path for created file.
     * Example: C:\foo\baz.pdf
     */
    public function setOutput(string $outputPath): Scanner
    {
        $this->addCommand('-o', $outputPath);

        return $this;
    }

    /**
     * Name of the profile to use when scanning.
     * Example: Canon MP495 (color)
     */
    public function setProfile(string $profile): Scanner
    {
        $this->addCommand('-p', $profile);

        return $this;
    }

    /**
     * Overwrite existing files.
     */
    public function force(): Scanner
    {
        $this->addCommand('--force');

        return $this;
    }

    /**
     * Adds a command to be executed.
     */
    private function addCommand($option, $value = null): void
    {
        if (null === $value) {
            $this->command[] = $option;
        } else {
            array_push($this->command, $option, $value);
        }

    }
}
