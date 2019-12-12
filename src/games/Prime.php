<?php

namespace BrainGames\games\Prime;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

function runPrime()
{
    $greeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $name = greetAndGetName($greeting);
    
    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
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
    if ($number < 2 || $number % 2 == 0) {
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
