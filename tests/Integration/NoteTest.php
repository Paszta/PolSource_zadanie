<?php

namespace Tests\Integration;

use App\Models\Note;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class NoteTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testDatabase_insertsuccessful(){

        $note = Note::factory()->create();

        $this->seeInDatabase('title', ['title' => $note->title]);



    }

    public function adding_note_complete(){
        $this->visit('/addNore')
            ->type($this -> faker ->words(6, true), 'title')
            ->type($this -> faker ->realText())
            ->press('Add note')
            ->seePageIs('/');
    }
}
