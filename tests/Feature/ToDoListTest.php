<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Routing\Route;
use Spatie\LaravelIgnition\Solutions\MakeViewVariableOptionalSolution;
use Tests\TestCase;

class ToDoListTest extends TestCase
{
    use RefreshDatabase;

    protected $list;

    public function setUp(): void
    {
        parent::setUp();
        $this->list = $this->createTodoList(['name' => 'my list']);
    }

    public function test_get_all_todo_list(): void
    {

        // TodoList::create(['name' => "My list"]);

        $response = $this->getJson(route('todo-list.index'));

        $this->assertEquals(1, count($response->json()));
    }

    public function test_fetch_single_list()
    {

        $response =  $this->getJson(route("todo-list.show", $this->list->id))
            ->assertOk()
            ->json();

        $this->assertEquals($response['name'], $this->list->name);
    }


    public function test_store_new_todo_list()
    {

        /// prepartion 
        /// Using Faker instance 
        $name = fake()->word;

        ///usnig make function  (Craete a factory without store data in DB)
        $list =  TodoList::factory()->make();


        /// perform 
        $response = $this->postJson(route('todo-list.store'), ['name' => $list->name])
            ->assertCreated()
            ->json();


        /// predict 

        $this->assertEquals($list->name, $response['name']);

        $this->assertDatabaseHas('todo_lists', ['name' => $list->name]);
    }


    public function test_while_storing_todo_list_is_name_field_required()
    {
        $this->withExceptionHandling();

        $this->postJson(route('todo-list.store'))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }

    public function test_delete_todo_list()
    {
        $this->deleteJson(route('todo-list.destroy', $this->list->id))
            ->assertNoContent();

        $this->assertDatabaseMissing('todo_lists', ['name' => $this->list->name]);
    }
    public function test_update_todo_list()
    {


        // prepare 
        $update_name = fake()->word();

        //perform 
        $this->patchJson(route('todo-list.update', $this->list->id), ['name' => $update_name])
            ->assertOk();

        //predict
        $this->assertDatabaseHas('todo_lists', [
            'id' => $this->list->id,
            'name' => $update_name,
        ]);
    }

    public function test_while_updating_todo_list_is_name_field_required()
    {

        $this->withExceptionHandling();

        $this->patchJson(route('todo-list.update', $this->list->id))
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    }
}
