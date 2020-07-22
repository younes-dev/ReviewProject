<?php


namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class StrCountExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('StrCount', [$this, 'StrCount']),
        ];
    }

    /**
     * @param $str
     * @return int
     */
    public function StrCount(string $str)
    {
        return str_word_count($str);

    }
}