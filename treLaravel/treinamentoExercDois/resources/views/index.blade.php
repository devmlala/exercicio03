<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Books</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
            <a href="{{ route('books.gerarCSV') }}" class="btn btn-secondary">Download CSV</a>
            <a href="{{ route('books.importarCSVForm') }}" class="btn btn-secondary">Importar CSV</a>
            <!-- Button to delete all records -->
        <form action="{{ route('books.destroyAll') }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete All Books</button>
        </form>
        </div>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Goodreads Book ID</th>
                    <th>Best Book ID</th>
                    <th>Work ID</th>
                    <th>Books Count</th>
                    <th>ISBN</th>
                    <th>ISBN13</th>
                    <th>Authors</th>
                    <th>Original Publication Year</th>
                    <th>Original Title</th>
                    <th>Title</th>
                    <th>Language Code</th>
                    <th>Average Rating</th>
                    <th>Ratings Count</th>
                    <th>Work Ratings Count</th>
                    <th>Work Text Reviews Count</th>
                    <th>Ratings 1</th>
                    <th>Ratings 2</th>
                    <th>Ratings 3</th>
                    <th>Ratings 4</th>
                    <th>Ratings 5</th>
                    <th>Image URL</th>
                    <th>Small Image URL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->id}}</td>
                        <td>{{ $book->goodreads_book_id }}</td>
                        <td>{{ $book->best_book_id }}</td>
                        <td>{{ $book->work_id }}</td>
                        <td>{{ $book->books_count }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td>{{ $book->isbn13 }}</td>
                        <td>{{ $book->authors }}</td>
                        <td>{{ $book->original_publication_year }}</td>
                        <td>{{ $book->original_title }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->language_code }}</td>
                        <td>{{ $book->average_rating }}</td>
                        <td>{{ $book->ratings_count }}</td>
                        <td>{{ $book->work_ratings_count }}</td>
                        <td>{{ $book->work_text_reviews_count }}</td>
                        <td>{{ $book->ratings_1 }}</td>
                        <td>{{ $book->ratings_2 }}</td>
                        <td>{{ $book->ratings_3 }}</td>
                        <td>{{ $book->ratings_4 }}</td>
                        <td>{{ $book->ratings_5 }}</td>
                        <td>{{ $book->image_url }}</td>
                        <td>{{ $book->small_image_url }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
