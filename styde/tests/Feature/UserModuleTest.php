<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuleTest extends TestCase
{
    /** @test **/
    function it_loads_the_user_list_page()
    {
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Users');
    }

    function it_shows_a_default_message_if_the_user_list_is_empty()
    {
        $this->get('/usuarios?empty')
            ->assertStatus(200)
            ->assertSee('No users registered.');
    }


    /** @test **/    
    function it_creates_a_new_user()
    {
        $this->get('usuarios/nuevo')
            ->assertStatus(200)
            ->assertSee('Creando nuevo usuario');
    }

    /** @test **/
    function it_loads_the_user_detail_page()
    {
        $this->get('/usuarios/5')
            ->assertStatus(200)
            ->assertSee('Mostrando detalles del usuario: 5');
    }

    /** @test **/
    function it_welcomes_users_with_nickname()
    {
        $this->get('saludo/hector/hecpalomares')
            ->assertStatus(200)
            ->assertSee('Bienvenido Hector, tu apodo es hecpalomares');
    }

    /** @test **/    
    function it_welcomes_users_without_nickname()
    {
        $this->get('saludo/hector')
            ->assertStatus(200)
            ->assertSee('Bienvenido Hector');
    }
}
