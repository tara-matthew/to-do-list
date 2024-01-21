<?php

namespace Tests\Unit\FormRequest;

use App\Http\Requests\UpdateTaskRequest;
use Tests\TestCase;

class UpdateTaskRequestTest extends TestCase
{
    private UpdateTaskRequest $updateTaskRequest;

    protected function setUp(): void
    {
        parent::setUp();
        $this->updateTaskRequest = new UpdateTaskRequest();
    }

    public function test_it_has_rules_set_up_as_expected(): void
    {
        $this->assertEquals(
            [
                'is_completed' => ['required', 'boolean'],
            ],
            $this->updateTaskRequest->rules()
        );
    }
}
