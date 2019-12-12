<?php

namespace BrainGames\games\Prime;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

function runPrime()
{
    $name = greetAndGetName('Answer "yes" if given number is prime. Otherwise answer "no".');
    
    for ($i = 0; $i < COUNT_QUESTIONS; $i += 1) {
        $number = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $resultGameStep = playGameStep($correctAnswer, $number, $name, $i);
        if (!$resultGameStep) {
            break;
        }
    }
}

function isPrime($number)
{
    if ($number == 2) {
        return true;
    }
    if ($number < 2) {
        return false;
    }
    for ($i = 2, $end = sqrt($number); $i <= $end; $i++) {
        if (!($number % $i)) {
            return false;
        }
    }
    
    return true;
}
