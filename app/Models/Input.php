<?php
namespace app\Models;

class Input {
    private int $input;

    public function __construct(int $input) {
        $this->input = $input;
    }

    public function getInput(): int {
        return $this->input;
    }

    public function checkIfPositiveInteger(): bool {
        if (filter_var($this->input, FILTER_VALIDATE_INT) === false || $this->input <= 0) {
            return false;
        }
        return true;
    }

}