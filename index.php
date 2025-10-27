<?php
    $name = "World";
    $age = 25;
    $students = ['Tomi', 'Segun'];

    // Associative array
    $studentData = [
        'id' => 1,
        'name' => 'Samuel',
        'class' => 'Level 2'
    ];

    echo $age.'<br>';
    print($name).'<br>';
    print_r($studentData['name'].'<br>');

    // String literals / string functions
    echo strrev($studentData['class']).'<br>';      // reverse a string
    echo strlen($name).'<br>';                          // string length
    echo strpos($name, 'o')
?>