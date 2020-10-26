<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Title;
use App\Content;

class FeatureTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setup(): void
    {
        parent::setUp();
        $this->seed('DatabaseSeeder');
    }

    public function testBasicRouteTest()
    {
        $this->get('/')->assertStatus(200);
        $this->get('/todo')->assertStatus(302);
        $this->get('/todo/show/1')->assertStatus(302);
        $this->get('/todo/addTitle')->assertStatus(302);
        $this->get('/todo/delete/1')->assertStatus(302);
        $this->get('/todo/editTitle')->assertStatus(302);
        $this->get('/todo/content')->assertStatus(302);
        $this->get('/todo/addContent/1')->assertStatus(302);
        $this->get('/login')->assertStatus(200);
        $this->get('/register')->assertStatus(200);
        $this->get('/easyLogin')->assertStatus(200);
        $this->get('/home')->assertStatus(200);
        $this->get('/noroute')->assertStatus(404);
        $response = $this->get(route('todo.show', ['id' => 1]));
        $response->assertStatus(302);
        $response = $this->post('/todo/create', ['title' => 'sample']);
        $response->assertStatus(302);
        $response = $this->post('/todo/editTitle', ['title' => 'sample']);
        $response->assertStatus(302);
    }
    
    public function testHTMLTest()
    {
        $this->get('/')->assertSeeInOrder(['<html','<head','<body','<header>']);
        
        $this->get('/')->assertSeeText('おかえりTodo');
        $this->get('/')->assertSeeText('TOPページ');
        // JS onclickの文章
        $this->get('/')->assertSeeText('家族と会う');
        $this->get('/')->assertSee('</div>');
    }
    
    // dataがテーブルに存在しているか（していないか）
    public function testCheckDataTest()
    {
        $data = [
            'id' => 1,
            'name' => 'test',
            'email' => 'test@yahoo.co.jp'
        ];
        $this->assertDatabaseHas('users', $data);
        
        $data = [
            'id' => 1,
            'name' => 'No_name',
            'email' => 'No_email'
        ];
        $this->assertDatabaseMissing('users', $data);
        
        $data = [
            'id' => 1,
            'user_id' => 1,
            'title' => 'Sample Title1'
        ];
        $this->assertDatabaseHas('titles', $data);
        
        $data = [
            'id' => 1,
            'user_id' => 1,
            'title' => 'NO_title'
        ];
        $this->assertDatabaseMissing('titles', $data);
        
        $data = [
            'id' => 1,
            'title_id' => 1,
            'heading' => 'heading',
            'body' => 'body1'
        ];
        $this->assertDatabaseHas('contents', $data);
        
        $data = [
            'id' => 1,
            'title_id' => 1,
            'heading' => 'NO_heading',
            'body' => 'NO_body1'
        ];
        $this->assertDatabaseMissing('contents', $data);
    }
    
    // dataを作成して、そのデータがあるかチェック、最後に削除
    public function testScrapAndBuildData()
    {
        $data = [
            // 自動連番のidは含めない
            'name' => 'dumy_name',
            'email' => 'dummy@yahoo.co.jp',
            'password' => 'testtest'
        ];
    
        $user = new User();
        $user->fill($data)->save();
        $this->assertDatabaseHas('users', $data);
        $user->delete();
        $this->assertDatabaseMissing('users', $data);

        $data = [
            'user_id' => 1,
            'title' => 'dummy',
        ];
        $title = new Title();
        $title->fill($data)->save();
        $this->assertDatabaseHas('titles', $data);
        $title->delete();
        $this->assertDatabaseMissing('titles', $data);
        
        $data = [
            'title_id' => 1,
            'heading' => 'dummy_heading',
            'body' => 'dummy_body',
        ];
        $content = new Content();
        $content->fill($data)->save();
        $this->assertDatabaseHas('contents', $data);
        $content->delete();
        $this->assertDatabaseMissing('contents', $data);


    
        $data = [
            'user_id' => 1,
            'title' => 'dummy1',
        ];

        $title->title = 'No match';
        $title->save();
        $this->assertDatabaseMissing('titles', $data);

        $user = factory(User::class)->create();
        // ログインできるUserでログインをする事ができる処理
        $respose = $this->actingAs($user)->get('/todo');
        $respose->assertStatus(200);
        $respose = $this->actingAs($user)->get('/todo/show/1');
        $respose->assertStatus(200);
        $respose = $this->actingAs($user)->get('/todo/addTitle');
        $respose->assertStatus(200);
        $respose = $this->actingAs($user)->get('/todo/addContent/1');
        $respose->assertStatus(200);


        
        



        // for($i = 0;$i < 100;$i++)
        // {
        //   factory(Title::class)->create();
        // }
        // $count = Title::get()->count();
        // $title = Title::find(rand(1, $count));
        // $data = $title->toArray();
        // print_r($data);

        // $this->assertDatabaseHas('titles', $data);
        
        // factory(User::class)->create([
        //     'name' =>'AAA BBB',
        //     'email' => 'dummy@gmail.com',
        //     'password' =>'passpass',
        //     ]);
        // // 上記のデータの他に5つダミーデータを生成する処理
        // factory(User::class, 5)->create();
        
        // $this->assertDatabaseHas('users', [
        //     'name' =>'AAA BBB',
        //     'email' => 'dummy@gmail.com',
        //     'password' =>'passpass',
        //     ]);
                
    }
    // use RefreshDatabase;


}
