<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Symfony\Component\Finder;

const BACKSPACE = "\x08";
const SYMBOL_PASS = "\u{2705}"; // green check;
const SYMBOL_FAIL = "\u{274C}"; // red cross;

$tests = Finder\Finder::create()->name('run_test')->in(__DIR__)->files();

$allTestsPassed = true;

foreach ($tests as $test) {
    if (!runTest($test)) {
        $allTestsPassed = false;
    }
}

if (!$allTestsPassed) {
    die(1);
}

function runTest(Finder\SplFileInfo $test): bool
{
    $testName = $test->getRelativePath();

    $runningMessage = "Running Test $testName ...";
    echo $runningMessage;

    ob_start();
    exec($test, $output, $return);
    ob_clean();

    //echo "Return $return; Output: " . PHP_EOL . implode(PHP_EOL, $output) . PHP_EOL;

    echo str_repeat(BACKSPACE, strlen($runningMessage));

    if ($return === 0) {
        echo mb_str_pad(SYMBOL_PASS . "  $testName Passed.", mb_strlen($runningMessage)) . PHP_EOL;
        return true;
    }

    echo mb_str_pad(SYMBOL_FAIL . "  $testName Failed!", mb_strlen($runningMessage)) . PHP_EOL;
    echo implode(PHP_EOL, $output) . PHP_EOL . PHP_EOL;

    return false;
}


// Because PHP still doesn't have this after almost 17 years
// https://bugs.php.net/bug.php?id=21317
function mb_str_pad(
    string $input,
    int $pad_length,
    string $pad_string = ' ',
    int $pad_style = STR_PAD_RIGHT,
    string $encoding = "UTF-8"
): string
{
    return str_pad($input, strlen($input) - mb_strlen($input, $encoding) + $pad_length, $pad_string, $pad_style);
}

