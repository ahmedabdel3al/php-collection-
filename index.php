<?php



use App\Collection;

require_once __DIR__ . '/vendor/autoload.php';
//fist lamps and Wallets


function lampsAndWallets()
{
    $url = 'https://raw.githubusercontent.com/victormongi/oop/master/products.json';

    $productJson = json_decode(file_get_contents($url), true);

    $products = new Collection($productJson['products']);

    return $products->filter(function ($product) {
        return  Collection::make(['Wallet', 'Lamp'])->contains($product['product_type']);
    })->pluck('variants')
        // ->map(function ($product) {
        //     return $product['variants'];
        // })
        ->flatten()
        ->pluck('price')
        ->sum();
}

dump(lampsAndWallets());























// $items = [

//     [
//         "id" => 1,
//         "name" => "Leanne Graham",
//         "username" => "Bret",
//         "email" => "Sincere@april.biz",
//         "address" => [],
//         "phone" => "1-770-736-8031 x56442",
//         "website" => "hildegard.org",
//         "company" => []
//     ],

//     [
//         "id" => 2,
//         "name" => "Ervin Howell",
//         "username" => "Antonette",
//         "email" => "",


//     ],
//     [
//         "id" => 3,
//         "name" => "Clementine Bauch",
//         "username" => "Samantha",
//         "email" => ""
//     ],
//     [
//         "id" => 4,
//         "name" => "Patricia Lebsack",
//         "username" => "Karianne",
//         "email" => "Julianne.OConner@kory.org"
//     ],

// ];

// $employees = new Collection([
//     ['name' => 'Mary', 'email' => 'mary@example.com', 'salaried' => true],
//     ['name' => 'John', 'email' => 'john@example.com', 'salaried' => false],
//     ['name' => 'Kelly', 'email' => 'kelly@example.com', 'salaried' => true],
// ]);
// $employeeEmails = $employees->map(function ($employee) {
//     return $employee['email'];
// });
// $salariedEmployees = $employees->filter(function ($employee) {
//     return $employee['salaried'];
// });

//dump($employeeEmails, $salariedEmployees);

// $numbers = new Collection([1, 2, 3]);
// dump($numbers);
// $numbers[] = 5;
// dump($numbers);
// $numbers[10] = 5;
// dump($numbers);
// unset($numbers[0]);
// dump($numbers);
// dump(count($numbers));

// foreach ($numbers as $key => $value) {
//     dump($key, $value);
// }

// $result =  Collection::make($items)
//     ->filter(function ($user) {
//         return $user['email'] !== "";
//     })
//     ->map(function ($item) {
//         return $item['email'];
//     })
//     ->toArray();
// dump($result);



// class a
// {
//     public $c = "ahmed";
//     public $b = "boly";
// }
// $aa = new a;
// foreach ($aa as $key => $value) {
//     dump($key, $value);
// }
