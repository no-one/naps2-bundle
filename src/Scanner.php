<?php
namespace noone\NAPS2Bundle;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class Scanner
 * @package noone\NAPS2Bundle
 */
class Scanner
{
    /** @var array Command that will be executed */
    private $command = [];

    /**
     * Scanner constructor.
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
        \array_push($this->command, '-o', $outputPath);

        return $this;
    }

    /**
     * Name of the profile to use when scanning.
     * Example: Canon MP495 (color)
     */
    public function setProfile(string $profile): Scanner
    {
        \array_push($this->command, '-p', $profile);

        return $this;
    }

    /**
     * Overwrite existing files.
     */
    public function force(): Scanner
    {
        \array_push($this->command, '--force');

        return $this;
    }
}
