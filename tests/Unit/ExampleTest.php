<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\User;
use phpDocumentor\Reflection\Types\Collection;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
//        $users = User::factory()->create();
    $users = User::factory()->count(4)->create();
//    $users = $users[0]->name;


    $users = collect($users)->map( function ($user) {return $user->toArray() ;} );

    self::assertSame(4,count($users));
//    dd($users);
    }
}
