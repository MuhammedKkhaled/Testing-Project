<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\TodoList;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
   
    public function setUp(): void
    {
        parent::setUp();

        // Show errors for test 
        $this->withoutExceptionHandling();

    }
}
