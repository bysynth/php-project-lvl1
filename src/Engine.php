<?php

namespace BrainGames\Engine;

const MAX_ROUNDS_COUNT = 3;

use function cli\prompt;
use function cli\line;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);

    return $name;
}

function run(string $game): void
{
    $gameNamespace = "\BrainGames\Games\\$game";

    $getGoalFunction = "$gameNamespace\getGameGoal";
    $getDataFunction = "$gameNamespace\getGameData";

    $goal = $getGoalFunction();
    $data = $getDataFunction();

    $playerName = greeting();

    line($goal);

    $rightAnswersCount = 0;

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $questionAndAnswer = $data[$i];
        line("Question: $questionAndAnswer[0]");
        $playersAnswer = prompt('Your answer', '');

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
