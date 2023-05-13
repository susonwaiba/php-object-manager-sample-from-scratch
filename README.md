# Php object manager sample from scratch

Version: Sample implementation

## Sample

```php
<?php

$om = new \App\ObjectManager();

$apple = $om->get(\App\Apple::class);
echo $apple->getColor(); // default red

$ball = $om->get(\App\Ball::class, [
    'color' => 'red' // default green
]);
echo $ball->getColor(); // red

$cat = $om->get(\App\Cat::class, [
    'ball' => $ball,
]);
echo $cat->getColor(); // default blue

$cat2 = $om->create(\App\Cat::class, [
    'color' => 'black',
]);
echo $cat2->getColor(); // black

```
