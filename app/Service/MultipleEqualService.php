<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Num;
use App\Service\IsServices\IsFoo;
use App\Service\IsServices\IsInf;
use App\Service\IsServices\IsQix;

class MultipleEqualService
{
    private array $resultArray = [];
    private string $result;
    private int $num;
    private int $sumOfAllDigits;

    public function isMultipleEqual(int $num): string
    {
        $this->resultArray = [];
        $this->num = $num;
        $numModel = new Num();
        $numModel->setNumber($num);
        $number = $numModel->getNumber();


        $isFoo = new IsFoo($number);
        $isInf = new IsInf($number);
        $isQix = new IsQix($number);

        if ($isFoo->isMultiple() !== null) {
            array_push($this->resultArray, $isFoo->isMultiple());
        }
        if ($isInf->isMultiple() !== null) {
            array_push($this->resultArray, $isInf->isMultiple());
        }
        if ($isQix->isMultiple() !== null) {
            array_push($this->resultArray, $isQix->isMultiple());
        }
        if (count($this->resultArray) === 0) {
            array_push($this->resultArray, $number);
        }

        $this->result = implode(';', $this->resultArray);


        if ($this->result === (string)$number) {
            $this->resultArray = [];
            $loopNumber = (string)$num;
            $splitNum = str_split($loopNumber);
            $numbers = array_map('intval', $splitNum);

            for ($j = 0; $j < count($numbers); $j++) {

                $numModel = new Num();
                $numModel->setNumber($numbers[$j]);
                $isFoo = new IsFoo($numModel->getNumber());
                $isInf = new IsInf($numModel->getNumber());
                $isQix = new IsQix($numModel->getNumber());

                if ($isFoo->isEqual() !== null) {
                    array_push($this->resultArray, $isFoo->isEqual());
                }
                if ($isInf->isEqual() !== null) {
                    array_push($this->resultArray, $isInf->isEqual());
                }
                if ($isQix->isEqual() !== null) {
                    array_push($this->resultArray, $isQix->isEqual());
                }

                $this->result = $num . ': ' . implode('', $this->resultArray);
            }
        }
        return $this->result . $this->sumAllDigits();
    }

    private function sumAllDigits(): ?string
    {
        $number = (string)$this->num;
        $splitNum = str_split($number);
        $numbers = array_map('intval', $splitNum);
        $this->sumOfAllDigits = array_sum($numbers);
        $inf = new IsInf($this->sumOfAllDigits);
        return $inf->isMultiple();
    }
}