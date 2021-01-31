<?php

namespace BrainGames\Games\Calc;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

function generateNumber(): int
{
    return mt_rand(1, 10);
}

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
    $num1 = generateNumber();
    $num2 = generateNumber();
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
