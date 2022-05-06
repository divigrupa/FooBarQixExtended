<?php
namespace app\Models;

class Condition {
    private int $condition;
    private string $returnIfTrue;

    public function __construct(int $condition, string $returnIfTrue) {
        $this->condition = $condition;
        $this->returnIfTrue = $returnIfTrue;
    }

    public function getCondition(): int {
        return $this->condition;
    }

    public function getReturnIfTrue(): string {
        return $this->returnIfTrue;
    }

}