<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Link;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LinkControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_add_shortify()
    {
        $response = $this->postJson('/api/link/store',
            ['url' => 'https://google.com']
        );

        $response->assertStatus(200);

        $response->assertJson([
            'success' => true
        ]);
    }

    public function test_posting_existing_url_returns_existing_record_slug()
    {
        $link = Link::factory()->create();

        $response = $this->postJson('/api/link/store',
            ['url' => $link->url]
        );

        $response->assertStatus(200);

        $response->assertJson([
            'short_url' => url($link->slug),
            'success' => true
        ]);
    }

    public function test_posting_non_url_string_returns_error_messages()
    {
        $response = $this->postJson('/api/link/store',
            ['url' => 'non url string']
        );

        $response->assertStatus(200);

        $response->assertJson([
            'success' => false
        ]);

        $response->assertSee('Invalid URL');
    }

    public function test_posting_without_url_returns_error_messages()
    {
        $response = $this->postJson('/api/link/store',
            []
        );

        $response->assertStatus(200);

        $response->assertJson([
            'success' => false
        ]);

        $response->assertSee('An URL is required');
    }
}
