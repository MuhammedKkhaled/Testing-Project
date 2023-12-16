<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    public function test_fetch_all_tasks_of_todo_list(): void
    {

        $task = Task::factory()->create();

        $response = $this->getJson(route('tasks.index'))
            ->assertOk()->json();

        $this->assertEquals(1,  count($response));
        $this->assertEquals($task->title, $response[0]['title']);
    }


    public function test_store_task_for_todo_list()
    {

        // Prepare 
        $task = Task::factory()->create();

        $this->postJson(route('tasks.store'), ['title' => $task->title])
            ->assertCreated();

        $this->assertDatabaseHas('tasks', ['title' => $task->title]);
    }

    public function test_delete_a_task_form_database()
    {
        $task = Task::factory()->create();

        $this->deleteJson(route('tasks.destroy', $task->id))
                    ->assertNoContent();

        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);
    }
}
