<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const GAME_TASK = 'What is the result of the expression?';

function getMathOperation(): string
{
    $operations = ['+', '-', '*'];
    return $operations[array_rand($operations)];
}

function getGameData(): array
{
    $operation = getMathOperation();
    $num1 = mt_rand(1, 10);
    $num2 = mt_rand(1, 10);
    $question = "$num1 $operation $num2";

    switch ($operation) {
        case '+':
            $answer = $num1 + $num2;
            break;
        case '-':
            $answer = $num1 - $num2;
            break;
        case '*':
            $answer = $num1 * $num2;
            break;
        default:
            throw new \Exception("Wrong operation: $operation\n");
    }

    return [$question, (string) $answer];
}

function play(): void
{
    run(fn() => getGameData(), GAME_TASK);
}
