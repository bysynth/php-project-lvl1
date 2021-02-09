<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Helpers\generateNumber;
use function BrainGames\Engine\run;

const MIN_PROGRESSION_ELEMENTS_COUNT = 5;
const GAME_GOAL = 'What number is missing in the progression?';

function generateProgression(int $start, int $step): array
{
    $result = [];
    $element = $start;
    $elementsCount = 0;
    $maxElementsCount = generateNumber(MIN_PROGRESSION_ELEMENTS_COUNT, 15);

    while ($elementsCount <= $maxElementsCount) {
        $result[] = $element;
        $element += $step;
        $elementsCount++;
    }

    return $result;
}

function getGameData(): array
{
    $progression = generateProgression(generateNumber(1, 5), generateNumber(1, 5));
    $lastProgressionIndex = count($progression) - 1;
    $secretElementIndex = generateNumber(0, $lastProgressionIndex);
    $answer = $progression[$secretElementIndex];
    $question = '';

    foreach ($progression as $i => $element) {
        if ($i !== $secretElementIndex) {
            $question = "{$question} {$element}";
        } else {
            $question = "{$question} ..";
        }
    }

    return [$question, (string) $answer];
}

function play(): void
{
    run('Progression', GAME_GOAL);
}
