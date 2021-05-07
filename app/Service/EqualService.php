<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Num;
use App\Service\IsServices\IsBar;
use App\Service\IsServices\IsFoo;
use App\Service\IsServices\IsQix;

class EqualService
{
    private array $equals = [];

    public function isEqual(int $num): string
    {
        $this->equals = [];
        $loopNumber = (string)$num;
        $splitNum = str_split($loopNumber);
        $numbers = array_map('intval', $splitNum);

        for ($j = 0; $j < count($numbers); $j++) {

            $numModel = new Num();
            $numModel->setNumber($numbers[$j]);
            $isFoo = new IsFoo($numModel->getNumber());
            $isBar = new IsBar($numModel->getNumber());
            $isQix = new IsQix($numModel->getNumber());
            array_push($this->equals,
                $isFoo->isEqual(),
                $isBar->isEqual(),
                $isQix->isEqual());

        }
        return $num . ': ' . implode('', $this->equals);
    }

}