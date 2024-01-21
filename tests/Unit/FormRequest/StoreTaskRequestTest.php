<?php

namespace Tests\Unit\FormRequest;

use App\Http\Requests\StoreTaskRequest;
use Tests\TestCase;

class StoreTaskRequestTest extends TestCase
{
    private StoreTaskRequest $storeTaskRequest;

    protected function setUp(): void
    {
        parent::setUp();
        $this->storeTaskRequest = new StoreTaskRequest();
    }

    public function test_it_has_rules_set_up_as_expected(): void
    {
        $this->assertEquals(
            [
                'name' => ['required', 'string', 'max:255'],
            ],
            $this->storeTaskRequest->rules()
        );
    }
}
