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

    /** @test */
    public function can_get_one_book()
    {
        $book = Book::factory()->create();

        //dd(route('books.show', $book));
        $response = $this->getJson(route('books.show', $book));

        $response->assertJsonFragment([
            'title' => $book->title
        ]);
    }

    /** @test */
    public function can_create_books()
    {
        $this->postJson(route('books.store'), [

        ])->assertJsonValidationErrorFor('title');

        $this->postJson(route('books.store'), [
            'title' => 'My new book'
        ])->assertJsonFragment([
            'title' => 'My new book'
        ]);
            
        $this->assertDatabaseHas('books', [
            'title' => 'My new book'
        ]);
    }
}
