<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_homepage_is_rendered()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
