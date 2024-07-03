<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="goodreads_book_id" class="form-label">Goodreads Book ID</label>
                <input type="number" class="form-control" id="goodreads_book_id" name="goodreads_book_id" value="{{ $book->goodreads_book_id }}" required>
            </div>
            <div class="mb-3">
                <label for="best_book_id" class="form-label">Best Book ID</label>
                <input type="number" class="form-control" id="best_book_id" name="best_book_id" value="{{ $book->best_book_id }}" required>
            </div>
            <div class="mb-3">
                <label for="work_id" class="form-label">Work ID</label>
                <input type="number" class="form-control" id="work_id" name="work_id" value="{{ $book->work_id }}" required>
            </div>
            <div class="mb-3">
                <label for="books_count" class="form-label">Books Count</label>
                <input type="number" class="form-control" id="books_count" name="books_count" value="{{ $book->books_count }}" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $book->isbn }}">
            </div>
            <div class="mb-3">
                <label for="isbn13" class="form-label">ISBN-13</label>
                <input type="text" class="form-control" id="isbn13" name="isbn13" value="{{ $book->isbn13 }}">
            </div>
            <div class="mb-3">
                <label for="authors" class="form-label">Authors</label>
                <input type="text" class="form-control" id="authors" name="authors" value="{{ $book->authors }}" required>
            </div>
            <div class="mb-3">
                <label for="original_publication_year" class="form-label">Original Publication Year</label>
                <input type="number" class="form-control" id="original_publication_year" name="original_publication_year" value="{{ $book->original_publication_year }}" required>
            </div>
            <div class="mb-3">
                <label for="original_title" class="form-label">Original Title</label>
                <input type="text" class="form-control" id="original_title" name="original_title" value="{{ $book->original_title }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>
            <div class="mb-3">
                <label for="language_code" class="form-label">Language Code</label>
                <input type="text" class="form-control" id="language_code" name="language_code" value="{{ $book->language_code }}">
            </div>
            <div class="mb-3">
                <label for="average_rating" class="form-label">Average Rating</label>
                <input type="number" step="0.01" class="form-control" id="average_rating" name="average_rating" value="{{ $book->average_rating }}" required>
            </div>
            <div class="mb-3">
                <label for="ratings_count" class="form-label">Ratings Count</label>
                <input type="number" class="form-control" id="ratings_count" name="ratings_count" value="{{ $book->ratings_count }}" required>
            </div>
            <div class="mb-3">
                <label for="work_ratings_count" class="form-label">Work Ratings Count</label>
                <input type="number" class="form-control" id="work_ratings_count" name="work_ratings_count" value="{{ $book->work_ratings_count }}" required>
            </div>
            <div class="mb-3">
                <label for="work_text_reviews_count" class="form-label">Work Text Reviews Count</label>
                <input type="number" class="form-control" id="work_text_reviews_count" name="work_text_reviews_count" value="{{ $book->work_text_reviews_count }}" required>
            </div>
            <div class="mb-3">
                <label for="ratings_1" class="form-label">Ratings 1</label>
                <input type="number" class="form-control" id="ratings_1" name="ratings_1" value="{{ $book->ratings_1 }}" required>
            </div>
            <div class="mb-3">
                <label for="ratings_2" class="form-label">Ratings 2</label>
                <input type="number" class="form-control" id="ratings_2" name="ratings_2" value="{{ $book->ratings_2 }}" required>
            </div>
            <div class="mb-3">
                <label for="ratings_3" class="form-label">Ratings 3</label>
                <input type="number" class="form-control" id="ratings_3" name="ratings_3" value="{{ $book->ratings_3 }}" required>
            </div>
            <div class="mb-3">
                <label for="ratings_4" class="form-label">Ratings 4</label>
                <input type="number" class="form-control" id="ratings_4" name="ratings_4" value="{{ $book->ratings_4 }}" required>
            </div>
            <div class="mb-3">
                <label for="ratings_5" class="form-label">Ratings 5</label>
                <input type="number" class="form-control" id="ratings_5" name="ratings_5" value="{{ $book->ratings_5 }}" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="text" class="form-control" id="image_url" name="image_url" value="{{ $book->image_url }}">
            </div>
            <div class="mb-3">
                <label for="small_image_url" class="form-label">Small Image URL</label>
                <input type="text" class="form-control" id="small_image_url" name="small_image_url" value="{{ $book->small_image_url }}">
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
