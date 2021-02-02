<?php

namespace Brain\Games\Cli;

use function cli\prompt;
use function cli\line;

function greeting(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);
}
