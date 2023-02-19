<?php

namespace Tests\Feature;

use App\Data\Foo;
use App\Data\Bar;
use Bar as GlobalBar;
use Foo as GlobalFoo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DependencyInjectionTest extends TestCase
{

    public function testDependencyInjection(){

        $foo = new GlobalFoo();
        $bar = new GlobalBar($foo);

        self::assertEquals('Foo and Bar', $bar->bar());
    }


    // /**
    //  * A basic feature test example.
    //  */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }
}
