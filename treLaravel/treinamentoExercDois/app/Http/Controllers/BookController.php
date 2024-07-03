<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index()
    {
        $books = Book::all();
        return view('index', compact('books'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function create(){
        return view('create');
    }

    /**
     * Store a newly created book in storage.
     */
    public function store(Request $request){
        //dd('cheguei');
        
        $validator = Validator::make($request->all(), [
            'goodreads_book_id' => 'required|integer',
            'best_book_id' => 'required|integer',
            'work_id' => 'required|integer',
            'books_count' => 'required|integer',
            'isbn' => 'required|string|max:13',
            'isbn13' => 'required|string|max:13',
            'authors' => 'required|string|max:255',
            'original_publication_year' => 'required|integer',
            'original_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'language_code' => 'required|string|max:2',
            'average_rating' => 'required|numeric',
            'ratings_count' => 'required|integer',
            'work_ratings_count' => 'required|integer',
            'work_text_reviews_count' => 'required|integer',
            'ratings_1' => 'required|integer',
            'ratings_2' => 'required|integer',
            'ratings_3' => 'required|integer',
            'ratings_4' => 'required|integer',
            'ratings_5' => 'required|integer',
            'image_url' => 'required|string|url',
            'small_image_url' => 'required|string|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        /**/


        Book::create($request->all());

        return redirect()->route('index')->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified book.
     */
    public function show(Book $book){
        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified book.
     */
    public function edit(Book $book){
        return view('edit', compact('book'));
    }

    /**
     * Update the specified book in storage.
     */
    public function update(Request $request, Book $book){
        $validator = Validator::make($request->all(), [
            'goodreads_book_id' => 'required|integer',
            'best_book_id' => 'required|integer',
            'work_id' => 'required|integer',
            'books_count' => 'required|integer',
            'isbn' => 'required|string|max:13',
            'isbn13' => 'required|string|max:13',
            'authors' => 'required|string|max:255',
            'original_publication_year' => 'required|integer',
            'original_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'language_code' => 'required|string|max:2',
            'average_rating' => 'required|numeric',
            'ratings_count' => 'required|integer',
            'work_ratings_count' => 'required|integer',
            'work_text_reviews_count' => 'required|integer',
            'ratings_1' => 'required|integer',
            'ratings_2' => 'required|integer',
            'ratings_3' => 'required|integer',
            'ratings_4' => 'required|integer',
            'ratings_5' => 'required|integer',
            'image_url' => 'required|string|url',
            'small_image_url' => 'required|string|url',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $book->update($request->all());

        return redirect()->route('index')->with('success', 'Book updated successfully.');
    }



    public function importarCSVForm()
    {
        return view('importcsv');
    }


    /**
     * Abrir a página create como teste
     */
    public function importarteste(){
        return "";
    }


    public function importarCSV(Request $request){
        // Verificar se o arquivo foi enviado corretamente
        if (!$request->hasFile('file') || !$request->file('file')->isValid()) {
            return redirect()->back()->withErrors(['error' => 'O arquivo enviado não é válido.']);
        }

        // Validar o arquivo CSV
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt|max:2048', // máximo de 2MB
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        // Processar o arquivo CSV
        $file = $request->file('file');
        $path = $file->getRealPath();
        $data = array_map('str_getcsv', file($path));
        //dd($data);

        // Obtendo o cabeçalho do CSV
        $header = $data[0];
        unset($data[0]); // Remove o cabeçalho do array de dados

        // Iterando sobre os dados e criando registros no banco de dados
        foreach ($data as $row) {
            // Combinando o cabeçalho com os dados de cada linha
            $bookData = array_combine($header, $row);

            // Criando um novo registro de Book no banco de dados
            Book::create([
                'goodreads_book_id' => $bookData['goodreads_book_id'],
                'best_book_id' => $bookData['best_book_id'],
                'work_id' => $bookData['work_id'],
                'books_count' => $bookData['books_count'],
                'isbn' => $bookData['isbn'],
                'isbn13' => $bookData['isbn13'],
                'authors' => $bookData['authors'],
                'original_publication_year' => $bookData['original_publication_year'],
                'original_title' => $bookData['original_title'],
                'title' => $bookData['title'],
                'language_code' => $bookData['language_code'],
                'average_rating' => $bookData['average_rating'],
                'ratings_count' => $bookData['ratings_count'],
                'work_ratings_count' => $bookData['work_ratings_count'],
                'work_text_reviews_count' => $bookData['work_text_reviews_count'],
                'ratings_1' => $bookData['ratings_1'],
                'ratings_2' => $bookData['ratings_2'],
                'ratings_3' => $bookData['ratings_3'],
                'ratings_4' => $bookData['ratings_4'],
                'ratings_5' => $bookData['ratings_5'],
                'image_url' => $bookData['image_url'],
                'small_image_url' => $bookData['small_image_url'],
            ]);
        }

        return redirect()->route('books.index')->with('success', 'CSV importado com sucesso.');
    }



    public function gerarCSV(){
        // Recupera todos os registros de livros
        $registros = Book::all();

        // Define os cabeçalhos HTTP para o arquivo CSV
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=books.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        // Função de callback que gera o conteúdo do CSV
        $callback = function() use ($registros) {
            // Abre um manipulador de arquivo para a saída no modo de escrita
            $file = fopen('php://output', 'w');
            
            // Escreve a linha de cabeçalho no arquivo CSV
            fputcsv($file, ['ID', 'Goodreads Book ID', 'Best Book ID', 'Work ID', 'Books Count', 'ISBN', 'ISBN13', 'Authors', 'Original Publication Year', 'Original Title', 'Title', 'Language Code', 'Average Rating', 'Ratings Count', 'Work Ratings Count', 'Work Text Reviews Count', 'Ratings 1', 'Ratings 2', 'Ratings 3', 'Ratings 4', 'Ratings 5', 'Image URL', 'Small Image URL']);
            
            // Itera sobre cada registro de livro e escreve os dados no arquivo CSV
            foreach ($registros as $registro) {
                fputcsv($file, [
                    $registro->id,
                    $registro->goodreads_book_id,
                    $registro->best_book_id,
                    $registro->work_id,
                    $registro->books_count,
                    $registro->isbn,
                    $registro->isbn13,
                    $registro->authors,
                    $registro->original_publication_year,
                    $registro->original_title,
                    $registro->title,
                    $registro->language_code,
                    $registro->average_rating,
                    $registro->ratings_count,
                    $registro->work_ratings_count,
                    $registro->work_text_reviews_count,
                    $registro->ratings_1,
                    $registro->ratings_2,
                    $registro->ratings_3,
                    $registro->ratings_4,
                    $registro->ratings_5,
                    $registro->image_url,
                    $registro->small_image_url
                ]);
            }

            // Fecha o manipulador de arquivo
            fclose($file);
        };

        // Retorna uma resposta de stream transmitindo o conteúdo gerado pela função de callback como um arquivo CSV
        return response()->stream($callback, 200, $headers);
    }



    /**
     * Remove the specified book from storage.
     */
    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    /**
     * Remover todos os registros.
     */

    public function destroyAll(){
        Book::truncate(); // Remove all records from the table
    
        return redirect()->route('books.index')->with('success', 'All books deleted successfully.');
    }


}
