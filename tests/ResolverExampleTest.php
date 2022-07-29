<?php

namespace tests;


require_once 'Classes/CPF.php';
require_once 'Classes/Person.php';

use CViniciusSDias\DependencyResolver\Resolver;
use \CPF;
use \Person;

test('Should be a object', function () {

    $cpf = new CPF('12345678901');

    $possible_person = ['name' => 'João', 'cpf' => $cpf];

    $joao = new Person(...$possible_person);
    expect($joao)->toBeObject();
});