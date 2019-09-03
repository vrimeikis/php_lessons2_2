<?php

declare(strict_types = 1);

$array = [
    [
        'first' => 10,
        'second' => 20,
    ],
    [
        'first' => 25,
        'second' => 15,
    ],
    [
        'first' => 10,
        'second' => 20,
    ],
    [
        'first' => 25,
        'second' => 15,
    ],
];

$max = PHP_INT_MIN;


function recursive(array $array, int $max)
{
    foreach ($array as $value) {
        if (is_array($value)) {
            $max = recursive($value, $max);
        } elseif ($max < $value) {
            $max = $value;
        }
    }

    return $max;
}

$max = recursive($array, $max);

print_r($max);

usort($array, function($a, $b) {
    return $a['second'] <=> $b['second'];
});

print_r($array);

function increase($a)
{
    $a['second'] = $a['second'] * 2;

    return $a;
}

$array2 = array_map('increase', $array);

print_r($array2);


class MyClass
{
    private $number = 10;

    private function doStuff()
    {
        $arr = [1,2,4];

        self::test($arr, 0, [], 'text');

        print_r($arr);
    }

    public static function test(array &$a, int $b = 0, array $c = [], ?string $d = null,  ?float $e = null): void
    {
        if (empty($a)) {
            return;
        }

        foreach ($a as $item) {
            unset($item);
        }
    }
}


/*=================================================*/

class Swed extends BankLinks implements BankLink {

    public function constructData(): array
    {
        return [];
    }

    public function signature(): string
    {
        $signature = parent::signature();

        return $signature.'asdfgfd';
    }

    public function getPayUrl(): string
    {
        // TODO: Implement getPayUrl() method.
    }
}

class Seb extends BankLinks implements BankLink {

    public function constructData(): array
    {
        return [];
    }

    public function getPayUrl(): string
    {
        // TODO: Implement getPayUrl() method.
    }
}

abstract class BankLinks {
    abstract public function constructData(): array;

    public function signature(): string {
        return 'some encoded data';
    }
}

interface BankLink {
    public function getPayUrl(): string;
}

class Bank {
    public function pay(BankLinks $bankClass) {
        $bankClass->constructData();
        $bankClass->signature();
    }
}

$bank = new Bank();
$swed = new Swed();
$seb = new Seb();

$bank->pay($seb);
$bank->pay($swed);





