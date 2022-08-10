<?php

namespace Tests\Unit;
use App\Models\User;
use Tests\TestCase;

class userTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_user_id()
    {
        $response = $this->get('/user/id');
        $response->assertStatus(200);
    }

    public function test_user_comment_post(){
        $this->withoutExceptionHandling();
        $response= $this->postJson('api/user',[
            'id'=>1,
            'comments' =>'victory to the spartans',
            'password'=>'720DF6C2482218518FA20FDC52D4DED7ECC043AB'
        ]);
        $response->assertOk();
        $response->assertStatus(200);
    }
}
