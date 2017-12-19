<?php

use App\User;
use App\Address;
use App\Event;
use App\Comment;

//{{require('../public/generator/generator.php')}}

require 'Faker-master/src/autoload.php';

$faker = Faker\Factory::create();
/*

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
$user['email'] = lcfirst($user['name']) . '.' . lcfirst($user['surname']) . '@' . $faker->freeEmailDomain;
$user['birth_date'] = $faker->date($format = 'Y-m-d', $max = '2001-01-01');
$user['login'] = substr($user['name'], 0, 3) . substr($user['surname'], -3) . substr($user['birth_date'], -2);
$user['phone_number'] = $faker->e164PhoneNumber;
$user['job'] = $faker->jobTitle;
$user['notes'] = $faker->text($maxNbChars = 100);
$user['countries'] = implode($faker->randomElements(array('Ukraine ', 'Poland ', 'Germany ', 'Netherlands ', 'Denmark ', 'Norway ', 'Sweden ', 'Spain '), $count = (rand(1, 8))));
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
/*
for ($i = 0; $i < 20; $i++) {
    $r = rand(1, 2);
    if ($r == 1) {
        $event['type'] = 'meeting';
    } else $event['type'] = 'travel';
    $event['id_user'] = rand(50, 142);
    $event['id_address_event'] = rand(106, 111);
    $event['event_name'] = $faker->sentence($nbWords = 4, $variableNWords = true);
    $event['arrive_date'] = $faker->date($format = 'Y-m-d');
    $event['notes'] = $faker->realText($maxNbChars = 200);
    if ($event['type'] === 'meeting') {
        $event['id_destination'] = rand(12, 110);
        $event['start_time'] = $faker->time();
        $event['end_time'] = $faker->time();
        $event['depart_date'] = null;
    } else {
        $event['depart_date'] = $faker->date();
        $event['id_destination'] = null;
        $event['start_time'] = null;
        $event['end_time'] = null;
    }
    Event::create([
        'id_user' => $event['id_user'],
        'id_address_event' => $event['id_address_event'],
        'id_destination' => $event['id_destination'],
        'event_name' => $event['event_name'],
        'arrive_date' => $event['arrive_date'],
        'depart_date' => $event['depart_date'],
        'start_time' => $event['start_time'],
        'end_time' => $event['end_time'],
        'type' => $event['type'],
        'notes' => $event['notes'],
    ]);
}
*/

for ($i = 0; $i < 30 ; $i++) {
    $comment['id_user_from_user_to_comment'] = rand(50, 142);
    $comment['id_event_from_event_to_comment'] = rand(7, 26);
    $comment['text'] = $faker->sentence($nbWords = 7, $variableNWords = true);

    Comment::create([
        'id_user_from_user_to_comment' => $comment['id_user_from_user_to_comment'],
        'id_event_from_event_to_comment' => $comment['id_event_from_event_to_comment'],
        'text' => $comment['text'],
    ]);
}
