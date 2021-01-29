<?php

namespace Brain\Games\Even;

use function cli\prompt;
use function cli\line;

const ATTEMPTS_COUNT = 3;

function greeting(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);

    return $name;
}

function printGameCondition(): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function generateNumber(): int
{
    return mt_rand(1, 20);
}

function isEven(int $int): bool
{
    return $int % 2 === 0;
}

function formatAnswer(bool $isEven): string
{
    return $isEven ? 'yes' : 'no';
}

function even(): void
{
    $rightAnswersCount = 0;
    $isWin = false;
    $playerName = greeting();
    printGameCondition();

    while ($rightAnswersCount < ATTEMPTS_COUNT) {
        $question = generateNumber();
        $answer = formatAnswer(isEven($question));
        line("Question: $question");
        $playersAnswer = prompt('Your answer', '', ': ');
        if ($playersAnswer === $answer) {
            line('Correct!');
            $rightAnswersCount += 1;
            $isWin = true;
        } else {
            line("'$playersAnswer' is wrong answer ;(. Correct answer was '$answer'.");
            $isWin = false;
            break;
        }
    }

    if ($isWin) {
        line("Congratulations, $playerName!");
    } else {
        line("Let's try again, $playerName!");
    }
}
