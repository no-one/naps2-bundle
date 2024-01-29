<?php
namespace noone\NAPS2Bundle;

/**
 * Provides access to the result of a scan.
 */
class ScanResult
{
    private string $output = '';
    private string $errorOutput = '';

    /**
     * @param string $output Content of the standard output
     * @param string $errorOutput Content of the error output
     */
    public function __construct(string $output, string $errorOutput)
    {
        $this->output = $output;
        $this->errorOutput = $errorOutput;
    }

    public function getOutput(): string
    {
        return $this->output;
    }

    public function getErrorOutput(): string
    {
        return $this->errorOutput;
    }
}
