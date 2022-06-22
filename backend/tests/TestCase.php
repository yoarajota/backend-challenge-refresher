<?php

namespace Tests;

use App\Models\Books;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    // Nunca trabalhei com unit tests automáticos, acredito que é uma ferramenta MUITO importante para o desenvolvimento e ganha um bom tempo. Fiz de uma forma que TALVEZ faça algum sentido, longe de ser o exencial, com melhores práticas e refinamentos. Posso me aprofundar mais no PHP UNIT se necessário.

    // Estou rodando o teste rodando --->

    public function testStore (){

        $book = new Books();

        $book->title = 'Title Test';
        $book->author = 'Author Test';
        $book->release_date = '2003-07-15';
        $book->rating = '5';
        $book->save();

        $result = Books::where('id', Books::max('id'))->first();

        self::assertEquals('Title Test', $result->title);
        self::assertEquals('Author Test', $result->author);
        self::assertEquals('5', $result->rating);
        self::assertEquals('2003-07-15', $result->release_date);
    }

    public function testUpdate (){
        
        $book = Books::find(Books::max('id'));

        $book->title = 'Title Test Update';
        $book->author = 'Author Test Update';
        $book->release_date = '2022-07-15';
        $book->rating = '3';
        $book->save();


        self::assertEquals('Title Test Update', $book->title);
        self::assertEquals('Author Test Update', $book->author);
        self::assertEquals('3', $book->rating);
        self::assertEquals('2022-07-15', $book->release_date);
    }

    public function testDestroy (){
        $id = Books::max('id');
        $book = Books::find($id);
        $book->delete();

        self::assertEquals(null, Books::find($id));
    }
}
