<?php


namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RepeatExtension extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction('repeat', [$this, 'strRepeat']),
        ];
    }

    /**
     * @param string $str
     * @param int $nbr
     * @return string
     */
    public function strRepeat(string $str, int $nbr)
    {
        return str_repeat($str,$nbr);
    }
}