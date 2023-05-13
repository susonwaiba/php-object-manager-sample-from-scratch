<?php

namespace App;

class Application
{
    public function execute(): void
    {
        echo PHP_EOL;

        $om = new ObjectManager();

        // Let's create new object from object manager
        $apple = $om->get(Apple::class);
        echo 'Apple color (default red): ';
        echo $apple->getColor();
        echo PHP_EOL;

        // Let's change constructor argument via dependency injection
        $ball = $om->get(Ball::class, ['yellow']);
        echo 'Ball color (yellow): ';
        echo $ball->getColor();
        echo PHP_EOL;

        // Let's change constructor argument via dependency injection
        $cat = $om->get(Cat::class, [
            'color' => 'updated',
        ]);
        echo 'Cat color (updated): ';
        echo $cat->getColor();
        echo PHP_EOL;

        // Check again if object is being reused
        $cat2 = $om->get(Cat::class);
        echo 'Cat2 color (should be updated): ';
        echo $cat2->getColor();
        echo PHP_EOL;

        // Let's create new object from object manager
        $cat3 = $om->create(Cat::class);
        echo 'Cat3 color (blue): ';
        echo $cat3->getColor();
        echo PHP_EOL;

        // End of application
        echo PHP_EOL;
        echo 'End of application';
        echo PHP_EOL;
    }
}
