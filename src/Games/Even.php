<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

const GAME_TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $int): bool
{
    return $int % 2 === 0;
}

function play(): void
{
    run(
        function (): array {
            $question = mt_rand(1, 10);
            $answer = isEven($question) ? 'yes' : 'no';

            return [$question, $answer];
        },
        GAME_TASK
    );
}
