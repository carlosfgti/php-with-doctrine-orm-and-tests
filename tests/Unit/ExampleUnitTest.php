<?php

use Src\Example;

function makeSut(): Example {
    return new Example;
}

it('Method test class Example should returns string', function () {
    $example = makeSut();
 
    expect($example->test())->toBeString();
});
