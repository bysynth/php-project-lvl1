<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Helpers\generateNumber;
use function BrainGames\Engine\run;

const GAME_GOAL = 'Answer "yes" if given number is prime. Otherwise answer "no".';

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

function getGameData(): array
{
    $question = generateNumber(2, 100);
    $answer = isPrime($question) ? 'yes' : 'no';

    return [$question, $answer];
}

function play(): void
{
    run('Prime', GAME_GOAL);
}
