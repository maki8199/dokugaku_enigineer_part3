<?php

class Test
{

    public function __construct(public string $name)
    {
    }

    function getName()
    {
        return $this->name;
    }
}

class Buff
{
    public function __construct(public array $buff)
    {
    }
}


$students = ["ken", "Mike", "Nic"];
$a = array_map(fn ($student) => new Test($student), $students);
$b = new Buff($a);
var_dump($b);
