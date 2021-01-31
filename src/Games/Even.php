<?php

namespace BrainGames\Games\Even;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

function generateNumber(): int
{
    return mt_rand(1, 10);
}

function getGameGoal(): string
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}

function isEven(int $int): bool
{
    return $int % 2 === 0;
}

function generateQuestionAndAnswer(): array
{
    $question = generateNumber();
    $answer = isEven($question) ? 'yes' : 'no';

    return [$question, $answer];
}

function getGameData(): array
{
    $data = [];
    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $data[] = generateQuestionAndAnswer();
    }

    return $data;
}