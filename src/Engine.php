<?php

namespace BrainGames\Engine;

const MAX_ROUNDS_COUNT = 3;

use function cli\prompt;
use function cli\line;

function run(callable $getDataFunc, string $gameTask): void
{
    if (!is_callable($getDataFunc)) {
        throw new \Exception('Oops! Something goes wrong...');
    }

    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $playerName);
    line($gameTask);

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getDataFunc();
        line("Question: $question");
        $playerAnswer = prompt('Your answer', '');

        if ($playerAnswer === $answer) {
            line('Correct!');
        } else {
            line("'$playerAnswer' is wrong answer ;(. Correct answer was '$answer'.");
            line("Let's try again, $playerName!");
            return;
        }
    }

    line("Congratulations, $playerName!");
}
