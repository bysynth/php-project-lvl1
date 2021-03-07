<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const GAME_GOAL = 'What is the result of the expression?';

function getMathOperation(): string
{
    $operations = ['+', '-', '*'];
    shuffle($operations);

    return $operations[0];
}

function getGameData(): array
{
    $operation = getMathOperation();
    $num1 = mt_rand(1, 10);
    $num2 = mt_rand(1, 10);
    $question = '';
    $answer = 0;

    switch ($operation) {
        case '+':
            $question = "{$num1} + {$num2}";
            $answer = $num1 + $num2;
            break;
        case '-':
            $question = "{$num1} - {$num2}";
            $answer = $num1 - $num2;
            break;
        case '*':
            $question = "{$num1} * {$num2}";
            $answer = $num1 * $num2;
            break;
        default:
            exit("Wrong operation: $operation\n");
    }

    return [$question, (string) $answer];
}

function play(): void
{
    run('Calc', GAME_GOAL);
}
