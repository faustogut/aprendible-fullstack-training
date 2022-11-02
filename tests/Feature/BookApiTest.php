<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_get_all_books()
    {
        $books = Book::factory(4)->create();

        //dd($books);
        //dd($books->count());
        //$this->get('/api/books')->dump();
        //$this->get(route('books.index'))->dump();
        $response = $this->getJson(route('books.index'));

        $response->assertJsonFragment([
            'title' => $books[0]->title
        ])->assertJsonFragment([
            'title' => $books[1]->title
        ]);
    }
}
