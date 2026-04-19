<?php

declare(strict_types=1);

namespace noone\NAPS2Bundle;

/**
 * Provides access to the result of a scan.
 */
class ScanResult
{
    public string $output {
        get {
            return $this->output;
        }
    }
    public string $errorOutput {
        get {
            return $this->errorOutput;
        }
    }

    /**
     * @param string $output Content of the standard output
     * @param string $errorOutput Content of the error output
     */
    public function __construct(string $output, string $errorOutput)
    {
        $this->output = $output;
        $this->errorOutput = $errorOutput;
    }
}
