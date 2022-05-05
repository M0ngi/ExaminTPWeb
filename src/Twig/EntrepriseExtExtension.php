<?php

namespace App\Twig;

use App\Entity\Entreprise;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class EntrepriseExtExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('nombrePFE', [$this, 'nombrePFE']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('nombrePFE', [$this, 'nombrePFE']),
        ];
    }

    public function nombrePFE(Entreprise $entreprise)
    {
        return sizeof($entreprise->getPFEs());
    }
}
