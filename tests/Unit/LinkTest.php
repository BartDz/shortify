<?php

namespace Tests\Unit;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_the_slug_is_generated_in_correct_format()
    {
        $this->assertMatchesRegularExpression(
            '/\w{10}/',
            Link::generateNewSlug()
        );
    }
}
