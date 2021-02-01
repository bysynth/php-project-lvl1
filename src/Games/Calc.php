<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Helpers\generateNumber;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

function getGameGoal(): string
{
    return 'What is the result of the expression?';
}

function generateRandomOperation(): string
{
    $operations = ['+', '-', '*'];
    shuffle($operations);

    return $operations[0];
}

function generateQuestionAndAnswer(string $operation): array
{
    $num1 = generateNumber(1, 10);
    $num2 = generateNumber(1, 10);
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
    }

    return [$question, (string) $answer];
}

function getGameData(): array
{
    $data = [];
    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $data[] = generateQuestionAndAnswer(generateRandomOperation());
    }

    return $data;
}
