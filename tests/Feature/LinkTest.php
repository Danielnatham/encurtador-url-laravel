<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Link;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Routing\Route;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LinkTest extends TestCase
{
        use RefreshDatabase;

        /**
         * Method used to setup user and link to use on every other test
         * 
         * @return void
         */
        public function setUp(): void{
            parent::setUp();

            $this->user = User::factory()->create();
            $this->link = Link::factory()->ofUser($this->user)->create();
        }

        /** @test
         * Verifies if the user can retrive the link list page livewire component
         */
        function test_link_page_contains_livewire_components(){
            $this->actingAs($this->user)
                    ->get(route('links.create'))
                    ->assertSeeLivewire('create-link');   
        }
        
        /** @test
         * Verifies if the user can retrive the link index page livewire component
         */
        function test_link_index_page_contains_livewire_components(){
            $this->actingAs($this->user)
                    ->get(route('links'))
                    ->assertSeeLivewire('link-table'); 
        }

         /** @test
         * Verifies if the user can create a link with custom slug
         * and if the link is saved in database
         */
        function test_can_create_link_with_custom_slug(){
            
            $this->assertDatabaseCount('links', 1);

            Livewire::actingAs($this->user)
                    ->test('create-link')
                    ->set('url', 'https://google.com.br')
                    ->set('slug', 'my-test-slug')
                    ->call('create-link')
                    ->assertRedirect(route('links'));

            $this->assertDatabaseCount('links', 2);
            $this->assertDatabaseHas('links', [
                'url' => 'google.com.br',
                'slug' => 'my-test-slug',
            ]);
        }

         /** @test
         * Verifies if the user can create a link whith a hashed slug
         * and if the link is saved in database
         */
        function test_can_create_link_without_custom_slug(){
            
            $this->assertDatabaseCount('links', 1);

            Livewire::actingAs($this->user)
                    ->test('create-link')
                    ->set('url', 'https://google.com.br')
                    ->set('slug', null)
                    ->call('create-link')
                    ->assertRedirect(route('links'));

            $this->assertDatabaseCount('links', 2);
            $this->assertDatabaseHas('links', [
                'url' => 'google.com.br',
                'slug' => Hashids::encode(2),
            ]);
        }

        /**
         * @test
         * Verifies if the user cannot create a link with a 
         * taken slug
         */
        function cannot_create_link_with_non_unique_slug(){
            
            $this->assertDatabaseCount('links', 1);

            Livewire::actingAs($this->user)
                    ->test('create-link')
                    ->set('url', 'https://google.com.br')
                    ->set('slug', $this->link->slug)
                    ->call('create-link')
                    ->assertHasErrors(['slug' => 'unique']);

            $this->assertDatabaseCount('links', 2);

        }

        /**
         * @test
         * Verifies if the short url redirects to the real url
         */
        public function test_can_redirect(){
            
            $this->actingAs($this->user)
                    ->get(route('redirect', $this->link->slug))
                    ->assertRedirect($this->link->url);
        }

         /**
         * @test
         * Verifies if the desable short url dont redirects
         */
        public function test_cannot_redirect_if_link_not_active(){

            $this->link->update(['is_active' => false]);

             $this->actingAs($this->user)
                    ->get(route('redirect', $this->link->slug))
                    ->assertStatus(404);
        }


}
