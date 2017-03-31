<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Subscriber;

class SubscribersTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * @test
     */
    public function can_create_a_subscriber()
    {
        $subscriber = Subscriber::newSubscriber("John", "Smith", "john.smith@example.com", "ON");

        $this->assertTrue(Subscriber::all()->contains($subscriber));
    }
}
