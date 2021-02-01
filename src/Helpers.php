<?php

namespace BrainGames\Helpers;

function generateNumber(int $from, int $to): int
{
    return mt_rand($from, $to);
}
