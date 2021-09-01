<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Link;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RedirectControllerTest extends TestCase
{
    use RefreshDatabase;

    private $link;

    public function setUp(): void
    {
        parent::setUp();

        $this->link = Link::factory()->create();
    }

    public function test_the_page_is_redirected()
    {
        $this->get('/' . $this->link->slug)
            ->assertStatus(302);
    }

    public function test_the_redirect_redirects_to_an_url_if_slug_is_found()
    {
        $this->get('/' . $this->link->slug);

        $this->assertContains(
            'Location: ' . $this->link->url, xdebug_get_headers()
        );
    }

    public function test_the_redirect_redirects_to_homepage_when_slug_is_not_found()
    {
        $this->followingRedirects()
            ->get('/x')
            ->assertLocation('/');
    }
}
