<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\StfcExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class StfcExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('territoryLevel', [StfcExtensionRuntime::class, 'territoryLevel']),
        ];
    }

    public function getFunctions(): array
    {
        return [
        ];
    }
}
