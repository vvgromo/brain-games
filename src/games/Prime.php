<?php

namespace BrainGames\Games\Prime;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

function runPrime()
{
    $name = greetAndGetName('Answer "yes" if given number is prime. Otherwise answer "no".');
    $startRandomNumber = 0;
    $endRandomNumber = 100;
    $countQuestions = 3;

    for ($i = 0; $i < $countQuestions; $i++) {
        $number = rand($startRandomNumber, $endRandomNumber);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $resultGameStep = playGameStep($correctAnswer, $number, $name);
        if (!$resultGameStep) {
            break;
        }
    }

    if ($resultGameStep) {
        congratulate($name);
    }
}

function isPrime($number)
{
    if ($number == 2) {
        return true;
    }
    
    if ($number % 2 == 0) {
        return false;
    }
    $i = 3;
    $maxFactor = (int)sqrt($number);
    while ($i <= $maxFactor) {
        if ($number % $i == 0) {
            return false;
        }
        $i += 2;
    }
    
    return true;
}
