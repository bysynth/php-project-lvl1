<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Helpers\generateNumber;

use const BrainGames\Engine\MAX_ROUNDS_COUNT;

const MAX_PROGRESSION_ELEMENTS_COUNT = 10;

function getGameGoal(): string
{
    return 'What number is missing in the progression?';
}

function generateProgression(int $start, int $step): array
{
    $result = [];
    $element = $start;
    $elementsCount = 0;

    while ($elementsCount < MAX_PROGRESSION_ELEMENTS_COUNT) {
        $result[] = $element;
        $element += $step;
        $elementsCount++;
    }

    return $result;
}

function generateQuestionAndAnswer(): array
{
    $progression = generateProgression(generateNumber(1, 5), generateNumber(1, 5));
    $secretElementIndex = generateNumber(0, 9);
    $answer = $progression[$secretElementIndex];
    $question = '';

    foreach ($progression as $i => $element) {
        if ($i !== $secretElementIndex) {
            $question .= "$element ";
        } else {
            $question .= ".. ";
        }
    }

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
