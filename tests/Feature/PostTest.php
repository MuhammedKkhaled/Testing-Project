<?php

// namespace Tests\Feature;

// use App\Models\Post;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class PostTest extends TestCase
// {

//     use RefreshDatabase;
//     /**
//      * A basic feature test example.
//      */
//     public function test_visit_empty_posts_page(): void
//     {
//         $response = $this->get('Posts');
//         $response->assertSee(_('No Posts'));
//         $response->assertStatus(200);
//     }

//     public function test_visit_non_empty_posts_page()
//     {
//         $post =  Post::create([
//             'title' => "Rich Dad Poor Dad",
//             "author" => "Robert de nairo "
//         ]);
//         $response = $this->get('Posts');
//         // $response->assertDontSee(_('No Posts'));
//         // $response->assertStatus(200);
//         // dd($response->status()); /// Get The Current status
//         dd($response->statusText()); /// Get the current text status [Bad Request  , NotFound ,Ok , Created , etc...]
//         // $response->assertViewHas("posts", function ($item) use ($post) {
//         //     return  $item->contains($post);
//         // });
//     }
// }
