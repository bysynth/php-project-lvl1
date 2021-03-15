<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const GAME_TASK = 'Find the greatest common divisor of given numbers.';

function gcd(int $num1, int $num2): int
{
    while ($num1 !== 0 && $num2 !== 0) {
        if ($num1 > $num2) {
            $num1 = $num1 % $num2;
        } else {
            $num2 = $num2 % $num1;
        }
    }

    return $num1 + $num2;
}

function getGameData(): array
{
    $num1 = mt_rand(1, 100);
    $num2 = mt_rand(1, 100);
    $question = "$num1 $num2";
    $answer = gcd($num1, $num2);

    return [$question, (string) $answer];
}

function play(): void
{
    run(fn() => getGameData(), GAME_TASK);
}
