<?php

namespace app\Models;

class Application {
    private string $result = '';
    private Input $input;
    private string $separator;
    private array $conditionsForMultiple;

    public function __construct(Input $input, string $separator, array $conditionsForMultiple) {
        $this->input = $input;
        $this->separator = $separator;
        $this->conditionsForMultiple = $conditionsForMultiple;
    }

    public function verificationForMultiple(): void {
        $inputValue = $this->input->getInput();
        foreach ($this->conditionsForMultiple as $condition) {
            if ($inputValue / $condition->getCondition() == round($inputValue / $condition->getCondition())) {
                $this->result .= "$this->separator " . $condition->getReturnIfTrue();
            }
        }
    }

    public function verificationForContains(array $conditionsForContains): void {
        if (empty($this->result)) $this->result .= $this->input->getInput();
        $inputValue = str_split($this->input->getInput(), 1);
        foreach ($inputValue as $oneInt) {
            foreach ($conditionsForContains as $condition) {
                if ($oneInt == $condition->getCondition()) {
                    $this->result .= "$this->separator " . $condition->getReturnIfTrue();
                }
            }
        }
    }

    public function getResult(): string {
        if (empty($this->result)) return strval($this->input->getInput());
        return trim($this->result, "$this->separator ");
    }

}

