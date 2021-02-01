<?php

namespace BrainGames\Games\Even;

use function BrainGames\Helpers\generateNumber;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

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
    $question = generateNumber(1, 10);
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
