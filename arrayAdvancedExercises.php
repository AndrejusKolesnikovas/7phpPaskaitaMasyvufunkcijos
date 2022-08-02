<?php

declare(strict_types=1);


function getShoppingCart(): array
{
    return [
        'products' => [
            'Comfy chair' => 'no data',
            'Yellow lamp' => [
                'price' => 15.3,
                'quantity' => 2,
            ],
            'Didzioji sofa' => [
                'pavadinimas' => 'Didzioji sofa',
                'kaina' => 'trylika eurų'
            ],
            'Softest rug' => [
                'price' => 27.3,
                'quantity' => 3,
                'discount' => 13,
            ],
            'Blue shelf' => [],
        ],
        'cartDiscounts' => [5, 16, 15],
    ];
}

// Visose užduotyse stenkitės naudoti array funkcijas

function exercise1(): void
{

    /*
    Išspausdinti visų krepšelio produktų pavadinimus vienoje eilutėje.
    Comfy chair, Yellow lamp, Didzioji sofa, Softest rug, Blue shelf
    */
var_dump(implode(', ',array_keys(getShoppingCart()['products']) ));
}
//exercise1();

function exercise1_foreach(): void
{

    /*
    Išspausdinti visų krepšelio produktų pavadinimus vienoje eilutėje.
    Comfy chair, Yellow lamp, Didzioji sofa, Softest rug, Blue shelf
    */
    $names = [];
    foreach (getShoppingCart()['products'] as $key => $product) {
        $names[] = $key;
    }

    echo implode(', ', $names);
}

function exercise2(): float
{
    /*
    Suskaičiuokite pirkimų krepšelio bendrą sumą (price * quantity)
    Kaip matote, krepšelio duomenys, kuriuos gavome iš svetimos sistemos, yra netvarkingi.
    - Skaičiuojant reikėtų atsižvelgti tik į produktus, kurie turi laukus 'price' ir 'quantity'.
    Jeigu produkto laukai užvadinti kitais pavadinimais arba iš viso jų neturi, tą produktą reikia ignoruoti.
    */

    $products = getShoppingCart()['products'];
    $products = array_filter(
        $products,
        function (array|string $product): bool {
            return is_array($product);
        }
    );

    return array_reduce(
        $products,
        function (int $total, array $product): int|float {
            if (isset($product['price']) && isset($product['quantity'])) {
                $total = $total + $product['price'] * $product['quantity'];
            }

            return $total;
        },
        0
    );
}
//echo exercise2();

function exercise4(array $newIpList): array
{
    $existingIpList = [
        '1.17.2.1',
        '15.1.2.1',
        '1.9.2.1',
        '1.1.98.1',
        '1.1.2.12',
        '1.11.2.1',
        '122.1.2.1',
        '1.31.2.1',
        '33.12.2.1',
    ];

    /*
    Sukategorizuokite ip adresų sąrašą.
    ipsNew - ip iš $newIpList, kurių nėra $existingIpList
    ipsOld - ip iš $existingIpList, kurių nėra $newIpList
    ipsRemaining - ip, kurie egzistuoja abiejuose sąrašuose

    funkcija butu kviečiam taip:
    exercise4(
        ['15.1.2.1', '16.1.8.1', '15.1.8.1']
    );
    */
    $ipsNew = array_diff($newIpList,$existingIpList);

    $ipsOld =  array_diff($existingIpList,$newIpList);
    $ipsRemaining=array_intersect($existingIpList,$newIpList);

    return [
        'ipsNew' => [$ipsNew],
        'ipsOld' => [$ipsOld],
        'ipsRemaining' => [$ipsRemaining],
    ];
}
print_r(exercise4(
    ['15.1.2.1', '16.1.8.1', '15.1.8.1']
));

function exercise5(): string
{
    $words = [
        'over',
        'jumps',
        'fox',
        'Quick',
        'dog',
        'lazy',
        'very',
        'the',
    ];

    /*
    "Išverskite" masyvą į kitą pusę ir paverskite į string tipo reikšmę.
    Arčiausiai vidurio esantys masyvo elementai turėtų atsirasti šonuose.
    Masyvo elementų skaičius galėtų dideti, bet jis visada bus lyginis.
    Rezultatas turėtų būti - 'Quick fox jumps over the very lazy dog'
    */
    return '';
}


/*
    exercise 6
    Parašykite savo array_map funkcijos versiją nesinaudodami pačia array_map funkcija
*/
function array_map_custom(callable $callback, array $array): array
{
    return [];
}

/*
    exercise 7
    Parašykite savo array_filter funkcijos versiją nesinaudodami pačia array_filter funkcija
*/
function array_filter_custom(array $array, ?callable $callback): array
{
    return [];
}

/*
    exercise 8
    Parašykite savo array_reduce funkcijos versiją nesinaudodami pačia array_reduce funkcija
*/
function array_reduce_custom(array $array, callable $callback, $carry)
{
    return 'array reduced to string';
}
