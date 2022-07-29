<?php

namespace tests;

use CViniciusSDias\DependencyResolver\Resolver;
use Exception;

class Class1 {
    private $class2;

    public function __construct(Class2 $class, Class3 $class3){
        echo $class3->method();
        $this->class2 = $class;
    }

    public function test(){
        echo $this->class2;
    }
}



class Class2{

    public function __construct(Class3 $test, $param = 'default value'){
        echo $param . PHP_EOL;
    }

    public function __toString(){
        return 'Class2::__toString()';
    }
}

class Class3 {
    
    public function __construct($paramWithoutDefaulValue){}

    public function method(){
        return 'Class3::method()' . PHP_EOL;
    }
}

beforeEach(function(){
    $this->resolver = new Resolver();
    $this->resolver->setParameters(Class3::class, ['paramWithoutDefaulValue' => 'manual value']);
    $this->class1 = $this->resolver->resolve(Class1::class);
});




// Resolver usage
/* $resolver = new Resolver();
$resolver->setParameters(Class3::class, ['paramWithoutDefaulValue' => 'manual value']);
$class1 = $resolver->resolve(Class1::class); */
/* $class1->test(); */

test('Should be a object', function () {
    expect($this->class1)->toBeObject();
});

test('Cannot access private property"', function () {
    expect($this->class1->class2)->toBeString();
})->throws('Cannot access private property tests\Class1::$class2');


test('Should be equals Class2::__toString()', function () {
    expect($this->class1->test())->toEqual('Class2::__toString()');
})->skip();

