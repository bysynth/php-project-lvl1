<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const MIN_ELEMENTS_COUNT = 5;
const MAX_ELEMENTS_COUNT = 15;
const MIN_FIRST_ELEMENT = 0;
const MAX_FIRST_ELEMENT = 5;
const MIN_STEP = 1;
const MAX_STEP = 5;
const GAME_TASK = 'What number is missing in the progression?';

function generateProgression(int $firstElement, int $step, int $maxElementsCount): array
{
    $result = [];

    for ($i = 0; $i < $maxElementsCount; $i++) {
        $result[] = $firstElement + $step * $i;
    }

    return $result;
}

function getGameData(): array
{
    $firstElement = mt_rand(MIN_FIRST_ELEMENT, MAX_FIRST_ELEMENT);
    $step = mt_rand(MIN_STEP, MAX_STEP);
    $maxElementsCount = mt_rand(MIN_ELEMENTS_COUNT, MAX_ELEMENTS_COUNT);

    $progression = generateProgression($firstElement, $step, $maxElementsCount);

    $secretElementIndex = array_rand($progression);
    $answer = $progression[$secretElementIndex];
    $progression[$secretElementIndex] = '..';
    $question = implode(' ', $progression);

    return [$question, (string) $answer];
}

function play(): void
{
    run(fn() => getGameData(), GAME_TASK);
}
