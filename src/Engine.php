<?php

namespace BrainGames\Engine;

use function cli\prompt;
use function cli\line;
use function BrainGames\Games\Calc\getGameGoal as calcGoal;
use function BrainGames\Games\Calc\getGameData as calcData;
use function BrainGames\Games\Even\getGameGoal as evenGoal;
use function BrainGames\Games\Even\getGameData as evenData;

const MAX_ROUNDS_COUNT = 3;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);

    return $name;
}

function run(string $game): void
{
    $goal = '';
    $data = [];

    if ($game === 'calc') {
        $goal = calcGoal();
        $data = calcData();
    }

    if ($game === 'even') {
        $goal = evenGoal();
        $data = evenData();
    }

    $playerName = greeting();

    line($goal);

    $rightAnswersCount = 0;

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $questionAndAnswer = $data[$i];
        line("Question: $questionAndAnswer[0]");
        $playersAnswer = prompt('Your answer', '', ': ');

        if ($playersAnswer === $questionAndAnswer[1]) {
            line('Correct!');
            $rightAnswersCount++;
        } else {
            line("'$playersAnswer' is wrong answer ;(. Correct answer was '$questionAndAnswer[1]'.");
            break;
        }
    }

    if ($rightAnswersCount === MAX_ROUNDS_COUNT) {
        line("Congratulations, $playerName!");
    } else {
        line("Let's try again, $playerName!");
    }
}
