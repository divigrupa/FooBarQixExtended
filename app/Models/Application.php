<?php

namespace app\Models;

class Application {
    private string $result = '';
    private Input $input;
    private array $conditionsForMultiple;

    public function __construct(Input $input, array $conditionsForMultiple) {
        $this->input = $input;
        $this->conditionsForMultiple = $conditionsForMultiple;
    }

    public function verificationForMultiple(): void {
        $inputValue = $this->input->getInput();
        foreach ($this->conditionsForMultiple as $condition) {
            if ($inputValue / $condition->getCondition() == round($inputValue / $condition->getCondition())) {
                $this->result .= ", " . $condition->getReturnIfTrue();
            }
        }
    }

    public function getResult(): string {
        if (empty($this->result)) return strval($this->input->getInput());
        return trim($this->result, ", ");
    }

}

