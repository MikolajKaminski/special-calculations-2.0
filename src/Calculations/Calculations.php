<?php

namespace Calculations;

class Calculations
{
	// calcDivisors takes an integer and returns an array with all of the integer's divisors (except for 1 and the number itself). Prime numbers are not allowed.
    public static function calcDivisors($inputNumber)
    {
        // Ensure input number is an integer
        if(!is_int($inputNumber))
        {
            throw new \InvalidArgumentException(
                print($inputNumber . " is not an Integer.")
            );
        }

        $resultArray = Calculations::findDivisors($inputNumber);

        // If array is empty, the number is a prime number
        if(sizeof($resultArray) == 0)
        {
            throw new \InvalidArgumentException(
                print($inputNumber . ' is a Prime Number.')
            );
        }

        return $resultArray;
    }

    //calcFactorial calculates and returns the factorial for a given input. Input below 0 and above 12 is not allowed.
    public static function calcFactorial($inputNumber)
    {
    	// Ensure input number is an integer
        if(!is_int($inputNumber))
        {
            throw new \InvalidArgumentException(
                print($inputNumber . " is not an Integer.")
            );
        }

        // Ensure input number is between 0 and 12
        if($inputNumber < 0 || $inputNumber > 12)
        {
            throw new \InvalidArgumentException(
                print("Input below 0 and above 12 is not allowed. Your input: " . $inputNumber . ".")
            );
        }
        
        // Calculate the factorial value
        $factorial = 1;
        for($x = $inputNumber; $x > 1; $x--)
        {
            $factorial = $factorial * $x;
        }

        return $factorial;
    }

    //calcPrimeNumbers takes an array with integers finds the prime numbers and returns the result as a XML document which each found prime number in a ‘number’ node.
    public static function calcPrimeNumbers($inputArray)
    {
        // Ensure all input numbers in input array are integers and check whether they are prime
        $primesArray = array(); 

        foreach($inputArray as $number)
        {
            if(!is_int($number))
            {
                throw new \InvalidArgumentException(
                    print($number . " is not an Integer.")
                );
            }

            if(sizeof(Calculations::findDivisors($number)) == 0)
                array_push($primesArray, $number);
        }

        // Create XML Document from primes array
        $xml = new \XMLWriter();
        $xml->openURI('php://output');
        $xml->startDocument('1.0', 'UTF-8');

        $xml->startElement('primeNumbers');
        $xml->writeAttribute('amount', sizeof($primesArray));
        $xml->startElement('result');

        foreach($primesArray as $prime)
        {
            $xml->startElement('number');
            $xml->text($prime);
            $xml->endElement();
        }
        
        $xml->endElement();
        $xml->endElement();

        return $xml->flush();   
    }


    // Finds all divisors of number without 1 and the number itlsef
    // Doesn't check for correct input!
    private function findDivisors($number): array
    {
        $divisorsArray = array();

        // Check for divisors between 2 and square root of input number
        for ($i = 2; $i <= sqrt(abs($number)); $i++)
        {
            if ($number%$i == 0)
            {
                // Add only once if it is the exact square root of input number
                if (abs($number) / $i == $i)
                    array_push($divisorsArray, $i);
    
                // Otherwise add both numbers as divisors
                else
                    array_push($divisorsArray, $i, abs($number/$i));
            }
        }

        return $divisorsArray;
    }
}