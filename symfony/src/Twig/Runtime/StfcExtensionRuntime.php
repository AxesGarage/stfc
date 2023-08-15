<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class StfcExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function territoryLevel($value)
    {
        return '\\' . implode('\\', str_split($value));
    }
}
