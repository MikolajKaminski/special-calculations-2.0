<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Calculations\Calculations;

// DIVISOR TESTS
echo "\n\n--- Calculate divisors ---";
// SUCCESSFUL
echo "\n\nExpected output: 2, 3\nActual output: ";
print_r(Calculations::calcDivisors(6));
echo "\n\nExpected output: 2, 5\nActual output: ";
print_r(Calculations::calcDivisors(10));
echo "\n\nExpected output: 2, 8, 4\nActual output: ";
print_r(Calculations::calcDivisors(-16));
// UNSUCCESSFUL
echo "\n\nExpected output: fail\nActual output: ";
try {
    Calculations::calcDivisors(1.5);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo "\n\nExpected output: fail\nActual output: ";
try {
    Calculations::calcDivisors(-1);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// FACTORIAL TESTS
echo "\n\n--- Calculate factorial ---";
// SUCCESSFUL
echo "\n\nExpected output: 720\nActual output: ";
print_r(Calculations::calcFactorial(6));
echo "\n\nExpected output: 3628800\nActual output: ";
print_r(Calculations::calcFactorial(10));
echo "\n\nExpected output: 1\nActual output: ";
print_r(Calculations::calcFactorial(0));
// UNSUCCESSFUL
echo "\n\nExpected output: fail\nActual output: ";
try {
    Calculations::calcFactorial(1.5);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo "\n\nExpected output: fail\nActual output: ";
try {
    Calculations::calcFactorial(-10);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

// PRIME NUMBER TESTS
echo "\n\n--- Calculate prime numbers ---\n\n";
// SUCCESSFUL
echo "\n\nExpected output: 1, 5, 7\nActual output: ";
print_r(Calculations::calcPrimeNumbers(array(1, 4, 5, 7, 10)));
echo "\n\nExpected output: 3\nActual output: ";
print_r(Calculations::calcPrimeNumbers(array(3, 9, -10)));
// UNSUCCESSFUL
echo "\n\nExpected output: fail\nActual output: ";
try {
    Calculations::calcPrimeNumbers(array(1, 4, 10, 1.5));

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
echo "\n\nExpected output: fail\nActual output: ";
try {
    Calculations::calcPrimeNumbers(array(3, 10, 'text'));

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

echo "\n\n";