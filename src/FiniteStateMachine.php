<?php

namespace App;

abstract class FiniteStateMachine
{
    protected string $state;
    protected array $transitions;
    protected array $outputs;

    public function __construct()
    {
        $this->state = $this->initialState();
        $this->transitions = $this->defineTransitions();
        $this->outputs = $this->defineOutputs();
    }

    abstract protected function initialState(): string;
    abstract protected function defineTransitions(): array;
    abstract protected function defineOutputs(): array;

    protected function isValidInput(string $input): bool
    {
        // Default allows anything
        return true;
    }

    public function run(string $input): int
    {
        if (!$this->isValidInput($input)) {
            throw new \InvalidArgumentException('Invalid input.');
        }

        $state = $this->state;

        foreach (str_split($input) as $bit) {
            if (!isset($this->transitions[$state][$bit])) {
                throw new \InvalidArgumentException("Invalid input bit: $bit");
            }
            $state = $this->transitions[$state][$bit];
        }

        return $this->outputs[$state];
    }
}
