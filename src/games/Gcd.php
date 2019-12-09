<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

function runGcd()
{
    $name = greetAndGetName('Find the greatest common divisor of given numbers.');
    $startRandomNumber = 0;
    $endRandomNumber = 100;
    $countQuestions = 3;

    for ($i = 0; $i < $countQuestions; $i++) {
        $a = rand($startRandomNumber, $endRandomNumber);
        $b = rand($startRandomNumber, $endRandomNumber);
        $correctAnswer = gcd($a, $b);
        $question = "{$a} {$b}";
        $resultGameStep = playGameStep($correctAnswer, $question, $name);
        if (!$resultGameStep) {
            break;
        }
    }

    if ($resultGameStep) {
        congratulate($name);
    }
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
