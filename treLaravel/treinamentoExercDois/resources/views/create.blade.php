<!DOCTYPE html>
<html>
<head>
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Book</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="goodreads_book_id" class="form-label">Goodreads Book ID</label>
                <input type="number" class="form-control" id="goodreads_book_id" name="goodreads_book_id" autocomplete="goodreads-book-id" required>
            </div>
            <div class="mb-3">
                <label for="best_book_id" class="form-label">Best Book ID</label>
                <input type="number" class="form-control" id="best_book_id" name="best_book_id" autocomplete="best-book-id" required>
            </div>
            <div class="mb-3">
                <label for="work_id" class="form-label">Work ID</label>
                <input type="number" class="form-control" id="work_id" name="work_id" autocomplete="work-id" required>
            </div>
            <div class="mb-3">
                <label for="books_count" class="form-label">Books Count</label>
                <input type="number" class="form-control" id="books_count" name="books_count" autocomplete="books-count" required>
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" autocomplete="isbn">
            </div>
            <div class="mb-3">
                <label for="isbn13" class="form-label">ISBN-13</label>
                <input type="text" class="form-control" id="isbn13" name="isbn13" autocomplete="isbn13">
            </div>
            <div class="mb-3">
                <label for="authors" class="form-label">Authors</label>
                <input type="text" class="form-control" id="authors" name="authors" autocomplete="authors" required>
            </div>
            <div class="mb-3">
                <label for="original_publication_year" class="form-label">Original Publication Year</label>
                <input type="number" class="form-control" id="original_publication_year" name="original_publication_year" autocomplete="original-publication-year" required>
            </div>
            <div class="mb-3">
                <label for="original_title" class="form-label">Original Title</label>
                <input type="text" class="form-control" id="original_title" name="original_title" autocomplete="original-title">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" autocomplete="title" required>
            </div>
            <div class="mb-3">
                <label for="language_code" class="form-label">Language Code</label>
                <input type="text" class="form-control" id="language_code" name="language_code" autocomplete="language-code">
            </div>
            <div class="mb-3">
                <label for="average_rating" class="form-label">Average Rating</label>
                <input type="number" class="form-control" id="average_rating" name="average_rating" step="0.01" autocomplete="average-rating" required>
            </div>
            <div class="mb-3">
                <label for="ratings_count" class="form-label">Ratings Count</label>
                <input type="number" class="form-control" id="ratings_count" name="ratings_count" autocomplete="ratings-count" required>
            </div>
            <div class="mb-3">
                <label for="work_ratings_count" class="form-label">Work Ratings Count</label>
                <input type="number" class="form-control" id="work_ratings_count" name="work_ratings_count" autocomplete="work-ratings-count" required>
            </div>
            <div class="mb-3">
                <label for="work_text_reviews_count" class="form-label">Work Text Reviews Count</label>
                <input type="number" class="form-control" id="work_text_reviews_count" name="work_text_reviews_count" autocomplete="work-text-reviews-count" required>
            </div>
            <div class="mb-3">
                <label for="ratings_1" class="form-label">Ratings 1</label>
                <input type="number" class="form-control" id="ratings_1" name="ratings_1" autocomplete="ratings-1" required>
            </div>
            <div class="mb-3">
                <label for="ratings_2" class="form-label">Ratings 2</label>
                <input type="number" class="form-control" id="ratings_2" name="ratings_2" autocomplete="ratings-2" required>
            </div>
            <div class="mb-3">
                <label for="ratings_3" class="form-label">Ratings 3</label>
                <input type="number" class="form-control" id="ratings_3" name="ratings_3" autocomplete="ratings-3" required>
            </div>
            <div class="mb-3">
                <label for="ratings_4" class="form-label">Ratings 4</label>
                <input type="number" class="form-control" id="ratings_4" name="ratings_4" autocomplete="ratings-4" required>
            </div>
            <div class="mb-3">
                <label for="ratings_5" class="form-label">Ratings 5</label>
                <input type="number" class="form-control" id="ratings_5" name="ratings_5" autocomplete="ratings-5" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url" autocomplete="image-url">
            </div>
            <div class="mb-3">
                <label for="small_image_url" class="form-label">Small Image URL</label>
                <input type="url" class="form-control" id="small_image_url" name="small_image_url" autocomplete="small-image-url">
            </div>
            <button type="submit" class="btn btn-primary">Create Book</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
