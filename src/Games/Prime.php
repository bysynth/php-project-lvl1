<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Helpers\generateNumber;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

function getGameGoal(): string
{
    return 'Answer "yes" if given number is prime. Otherwise answer "no".';
}

function isPrime(int $int): bool
{
    if ($int < 2) {
        return false;
    }

    for ($i = 2; $i < $int; $i++) {
        if ($int % $i === 0) {
            return false;
        }
    }

    return true;
}

function generateQuestionAndAnswer(): array
{
    $question = generateNumber(2, 100);
    $answer = isPrime($question) ? 'yes' : 'no';

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
