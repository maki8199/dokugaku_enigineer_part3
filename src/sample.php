<?php

function sayHello(string $argString): void
{
    echo "hello" . $argString . PHP_EOL;
}

sayHello("hello");
