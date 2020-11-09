<?php
namespace noone\NAPS2Bundle;

/**
 * Class ScanResult
 * @package noone\NAPS2Bundle
 */
class ScanResult
{
    private $output = '';
    private $errorOutput = '';

    /**
     * ScanResult constructor.
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
