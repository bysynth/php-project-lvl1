<?php

namespace BrainGames\Engine;

const MAX_ROUNDS_COUNT = 3;

use function cli\prompt;
use function cli\line;

function run(string $game, string $goal): void
{
    $gameNamespace = '\\BrainGames\\Games\\' . $game;
    $getData = "$gameNamespace\getGameData";

    if (!is_callable($getData)) {
        exit('Oops! Something goes wrong...');
    }

    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $playerName);
    line($goal);

    $rightAnswersCount = 0;

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        $gameData = $getData();
        line("Question: $gameData[0]");
        $playersAnswer = prompt('Your answer', '');

        if ($playersAnswer === $gameData[1]) {
            line('Correct!');
            $rightAnswersCount++;
        } else {
            line("'$playersAnswer' is wrong answer ;(. Correct answer was '$gameData[1]'.");
            break;
        }
    }

    if ($rightAnswersCount === MAX_ROUNDS_COUNT) {
        line("Congratulations, $playerName!");
    } else {
        line("Let's try again, $playerName!");
    }
}
