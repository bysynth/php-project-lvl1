<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const GAME_TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $int): bool
{
    if ($int <= 1) {
        return false;
    }

    for ($i = 2, $half = intdiv($int, 2); $i <= $half; $i++) {
        if ($int % $i === 0) {
            return false;
        }
    }

    return true;
}

function getGameData(): array
{
    $question = mt_rand(2, 100);
    $answer = isPrime($question) ? 'yes' : 'no';

    return [$question, $answer];
}

function play(): void
{
    run(fn() => getGameData(), GAME_TASK);
}
