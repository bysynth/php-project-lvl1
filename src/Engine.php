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
        throw new \Exception('Oops! Something goes wrong...');
    }

    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $playerName);
    line($goal);

    $rightAnswersCount = 0;

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getData();
        line("Question: $question");
        $playerAnswer = prompt('Your answer', '');

        if ($playerAnswer === $answer) {
            line('Correct!');
            $rightAnswersCount++;
        } else {
            line("'$playerAnswer' is wrong answer ;(. Correct answer was '$answer'.");
            break;
        }
    }

    if ($rightAnswersCount === MAX_ROUNDS_COUNT) {
        line("Congratulations, $playerName!");
    } else {
        line("Let's try again, $playerName!");
    }
}
