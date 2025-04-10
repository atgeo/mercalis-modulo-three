<?php

namespace App;

class ModThree extends FiniteStateMachine
{
    protected function initialState(): string
    {
        return 'S0';
    }

    protected function defineTransitions(): array
    {
        return [
            'S0' => ['0' => 'S0', '1' => 'S1'],
            'S1' => ['0' => 'S2', '1' => 'S0'],
            'S2' => ['0' => 'S1', '1' => 'S2'],
        ];
    }

    protected function defineOutputs(): array
    {
        return [
            'S0' => 0,
            'S1' => 1,
            'S2' => 2,
        ];
    }

    protected function isValidInput(string $input): bool
    {
        return $input !== '' && preg_match('/^[01]+$/', $input);
    }
}
