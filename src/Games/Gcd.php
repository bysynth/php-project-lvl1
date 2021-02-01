<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Helpers\generateNumber;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

function getGameGoal(): string
{
    return 'Find the greatest common divisor of given numbers.';
}

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

function generateQuestionAndAnswer(): array
{
    $num1 = generateNumber(1, 100);
    $num2 = generateNumber(1, 100);
    $question = "$num1 $num2";
    $answer = gcd($num1, $num2);

    return [$question, (string) $answer];
}

function getGameData(): array
{
    $data = [];
    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $data[] = generateQuestionAndAnswer();
    }

    return $data;
}
