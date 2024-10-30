<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_course()
    {
        // Create an admin user
        $admin = User::factory()->admin()->create();

        // Create an instructor
        $instructor = Instructor::factory()->create();

        // Act as the admin and attempt to create a course
        $response = $this->actingAs($admin)->post(route('courses.store'), [
            'title' => 'New Course',
            'description' => 'Course description',
            'instructor_id' => $instructor->id,
        ]);

        // Assert the course was created and redirected to the course index
        $response->assertRedirect(route('courses.index'));
        $this->assertDatabaseHas('courses', ['title' => 'New Course']);
    }
}
