<?php

namespace Tests\Feature;

use Illuminate\Http\UploadedFile;
use App\User;
use App\Post;
use App\Booking;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersTests extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_see_bookings(){

        //Number doesnt matter as its just there as the laravel url convention
        //I take the id from the auth() user
        $response = $this->get('/b/1')->assertRedirect('/login');
    }

    /** @test */

    public function authenticated_users_can_see_bookings(){

        
        $this->actingAs(factory(User::class)->create());

        //Number doesnt matter as its just there as the laravel url convention
        //I take the id from the auth() user
        $response = $this->get('/b/1')->assertOk();

    }

       /** @test */
    public function a_user_can_add_a_post_to_the_database(){

        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());

        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('/p',[

            'caption' => 'titulo',
            'type' => 'piso',
            'ubication' => 'zaragoza',
            'description' => 'el peor piso',
            'prize' => 45,
            'image' => $file,

        ]);

        $this->assertCount(1, Post::all());
    }


    /** @test */
    public function a_new_user_can_register(){
     
        $response = $this->post('/register',[

            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'username' => 'juanito',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $this->assertCount(1, User::all());
    }


      /** @test */
    public function a_new_user_can_view_a_login_form(){

        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }


    /** @test */
    public function authenticated_users_can_see_edit_post_form(){

        $this->actingAs(factory(User::class)->create());
        $response = $this->get('p/create')->assertOk();
    }


        /** @test */
    public function a_user_can_log_in()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = '12345678'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/');
    }


       /** @test */
       public function authenticated_users_can_see_their_update_form()  {
            
            $this->actingAs(factory(User::class)->create([
            'id' => '123',
           ]));
   
           $response = $this->get('/profile/123/edit')->assertOk();
       }



}
