<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Num;
use App\Service\IsServices\IsBar;
use App\Service\IsServices\IsFoo;
use App\Service\IsServices\IsQix;

class MultipleService
{
    public function isMultiple(int $num): string
    {

        $numModel = new Num();
        $numModel->setNumber($num);
        $number = $numModel->getNumber();

        $isFoo = new IsFoo($number);
        $isBar = new IsBar($number);
        $isQix = new IsQix($number);

        if ($isFoo->isMultiple() === null
            && $isBar->isMultiple() === null
            && $isQix->isMultiple() === null) {
            return (string)$num;
        } else {
            return $isFoo->isMultiple() . $isBar->isMultiple() . $isQix->isMultiple();
        }
    }
}