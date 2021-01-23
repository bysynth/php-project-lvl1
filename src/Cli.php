<?php

namespace Php\Project\Lvl1\Cli;

use function cli\prompt;
use function cli\line;

function greeting()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', '', ' ');
    line("Hello, %s!", $name);
}
