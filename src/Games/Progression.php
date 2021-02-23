<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Helpers\generateNumber;
use function BrainGames\Engine\run;

const MIN_PROGRESSION_ELEMENTS_COUNT = 5;
const MAX_PROGRESSION_ELEMENTS_COUNT = 14;
const GAME_GOAL = 'What number is missing in the progression?';

function generateProgression(): array
{
    $result = [];
    $maxElementsCount = generateNumber(MIN_PROGRESSION_ELEMENTS_COUNT, MAX_PROGRESSION_ELEMENTS_COUNT);
    $step = generateNumber(1, 5);

    for ($i = 1; $i <= $maxElementsCount; $i++) {
        $result[] = $step + $step * ($i - 1);
    }

    return $result;
}

function getGameData(): array
{
    $progression = generateProgression();
    $secretElementIndex = array_rand($progression);
    $answer = $progression[$secretElementIndex];
    $progression[$secretElementIndex] = '..';
    $question = implode(' ', $progression);

    return [$question, (string) $answer];
}

function play(): void
{
    run('Progression', GAME_GOAL);
}
