<?php

namespace BrainGames\Engine;

const MAX_ROUNDS_COUNT = 3;

use function cli\prompt;
use function cli\line;

function run(string $game): void
{
    $gameNamespace = "\BrainGames\Games\\$game";

    $getGoal = "$gameNamespace\getGameGoal";
    $getData = "$gameNamespace\getGameData";

    if (is_callable($getGoal) && is_callable($getData)) {
        $goal = $getGoal();
        $gameData = $getData();
    } else {
        exit('Oops! Something goes wrong...');
    }

    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $playerName);
    line($goal);

    $rightAnswersCount = 0;

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $questionAndAnswer = $gameData[$i];
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
