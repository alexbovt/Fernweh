<?php

use App\User;
use App\Address;

//{{require('../public/generator/generator.php')}}

require 'Faker-master/src/autoload.php';

$faker = Faker\Factory::create();



for ($i = 12; $i < 105; $i++) {
    $rand = rand(1, 2);
    if ($rand % 2 == 0) {
        $user['sex'] = 'female';
        $user['name'] = $faker->firstNameFemale;
    } else {
        $user['sex'] = 'male';
        $user['name'] = $faker->firstNameMale;
    }
    $user['surname'] = $faker->lastName;
    $user['email'] = lcfirst($user['name']).'.'.lcfirst($user['surname']).'@'.$faker->freeEmailDomain;
         $user['birth_date'] = $faker->date($format = 'Y-m-d', $max = '2001-01-01');
         $user['login'] = substr($user['name'], 0, 3).substr($user['surname'], -3).substr($user['birth_date'], -2);
         $user['phone_number'] = $faker->e164PhoneNumber;
         $user['job'] = $faker->jobTitle;
         $user['notes'] = $faker->text($maxNbChars = 100);
         $user['countries'] = implode($faker->randomElements(array('Ukraine ', 'Poland ', 'Germany ', 'Netherlands ', 'Denmark ', 'Norway ', 'Sweden ', 'Spain '),$count = (rand(1,8))));
         $user['languages'] = implode($faker->randomElements(array('Ukrainian ', 'Polish ', 'German ', 'Dutch ', 'Danish ', 'Norwegian ', 'Swedish ', 'Spanish ', 'English ', 'Portuguese ', 'Italian '), $count = rand(1, 5)));
         $user['education'] = $faker->randomElement(array('Harvard', 'ETH Zurich', 'UCL', 'Stanford', 'Leiden', 'Politechnika Lubelska', 'MIT', 'Cambridge', 'Princeton', 'Kyiv Polytechnic Institute', 'Lviv Polytechnic National University',
             'Oxford', 'Northwestern', 'Technical University of Munich', 'University of Amsterdam', 'Karolinska Institute', 'Taras Shevchenko National University of Kyiv',
             'University of Bristol', 'Leiden University', 'Utrecht University', 'Delft University of Technology', 'Czech Technical University in Prague'));
         $user['id_address'] = $i;
        if ($i % 5 == 1) {
            $user['id_address_home'] = rand(12, 100);
        } else
            $user['id_address_home'] = $i;
        User::insert([

            'id_address' => $user['id_address'],
            'id_address_home' => $user['id_address_home'],

            'email' => $user['email'],
            'login' => $user['login'],
            'password' => Hash::make('123123'),
            'name' => $user['name'],
            'surname' => $user['surname'],
            'birth_date' => $user['birth_date'],
            'sex' => $user['sex'],
            'phone_number' => $user['phone_number'],
            'education' => $user['education'],
            'languages' => $user['languages'],
            'job' => $user['job'],
            'countries' => $user['countries'],
            'notes' => $user['notes'],
        ]);
}
/*

for ($i = 0; $i < 10; $i++) {
    $address['country'] = $faker->randomElement(array('Ukraine', 'Poland', 'Germany', 'Netherlands', 'Denmark', 'Norway', 'Sweden', 'Spain'));
    switch ($address['country']) {
        case 'Ukraine':
            $address['city'] = $faker->randomElement(array('Kiev', 'Kharkiv', 'Dnipro', 'Odessa', 'Donetsk', 'Zaporizhia', 'Lviv', 'Kryvyi Rih', 'Mykolaiv'));
            break;
        case 'Poland':
            $address['city'] = $faker->randomElement(array('Warsaw', 'Krakуw', 'Јуdџ', 'Wrocіaw', 'Poznaс', 'Gdaсsk', 'Szczecin', 'Bydgoszcz', 'Lublin'));
            break;
        case 'Germany':
            $address['city'] = $faker->randomElement(array('Berlin', 'Hamburg', 'Mьnchen', 'Kцln', 'Frankfurt am Main', 'Stuttgart', 'Dьsseldorf', 'Dortmund', 'Essen'));
            break;
        case 'Netherlands':
            $address['city'] = $faker->randomElement(array('Amsterdam', 'Rotterdam', 'The Hague', 'Utrecht', 'Eindhoven', 'Tilburg', 'Groningen', 'Almere', 'Breda'));
            break;
        case 'Denmark':
            $address['city'] = $faker->randomElement(array('Copenhagen', 'Aarhus', 'Odense'));
            break;
        case 'Norway':
            $address['city'] = $faker->randomElement(array('Oslo', 'Bergen', 'Trondheim', 'Stavanger'));
            break;
        case 'Sweden':
            $address['city'] = $faker->randomElement(array('Stockholm', 'Gothenburg', 'Malmц', 'Uppsala'));
            break;
        case 'Spain':
            $address['city'] = $faker->randomElement(array('Madrid', 'Barcelona', 'Valencia', 'Seville', 'Bilbao', 'Mбlaga'));
            break;
    }
    $address['street'] = $faker->streetName;
    $address['house'] = rand(1, 300);
    $address['flat'] = rand(1, 300);

    Address::create([
        'country' => $address['country'],
        'city' => $address['city'],
        'street' => $address['street'],
        'house' => $address['house'],
        'flat' => $address['flat'],
    ]);

}

*/