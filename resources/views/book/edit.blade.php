<style>
    body {
        background: linear-gradient(135deg, #e0f7fa, #e1bee7);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
        border-radius: 20px;
        overflow: hidden;
    }

    .card-header {
        background: linear-gradient(90deg, #4e73df, #1cc88a);
        padding: 20px;
    }

    .card-header h3 {
        font-weight: bold;
        letter-spacing: 1px;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #ced4da;
        transition: all 0.3s ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 8px rgba(78, 115, 223, 0.4);
    }

    .btn-success {
        background: linear-gradient(90deg, #1cc88a, #17a673);
        border: none;
        border-radius: 12px;
        transition: all 0.3s ease-in-out;
    }

    .btn-success:hover {
        background: linear-gradient(90deg, #17a673, #13855c);
        transform: scale(1.05);
    }

    .card-footer {
        background: #f8f9fc;
        font-size: 16px;
    }

    .card-footer span {
        font-weight: bold;
    }
</style>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
            <div class="card shadow-lg border-0">
                <div class="card-header text-white text-center">
                    <h3 class="mb-0">📚 Edit Book Details</h3>
                </div>
                <div class="card-body p-4">

                    <form action="{{ route('update', $book->book_id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="bname" class="form-label fw-semibold">Book Title</label>
                            <input type="text" class="form-control" id="bname" name="bname"
                                value="{{ old('bname', $book->title) }}">
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label fw-semibold">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ old('author', $book->author) }}">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label fw-semibold">Category</label>
                            <select id="category_id" name="category_id" class="form-select">
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->category_id }}"
                                    {{ $book->category?->category_id == $cat->category_id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="publisher" class="form-label fw-semibold">Publisher</label>
                            <input type="text" class="form-control" id="publisher" name="publisher"
                                value="{{ old('publisher', $book->publisher) }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="year" class="form-label fw-semibold">Year Published</label>
                                <input type="number" class="form-control" id="year" name="year"
                                    value="{{ old('year', $book->year_publisher) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edition" class="form-label fw-semibold">Edition</label>
                                <input type="text" class="form-control" id="edition" name="edition"
                                    value="{{ old('edition', $book->edition) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lan" class="form-label fw-semibold">Language</label>
                            <input type="text" class="form-control" id="lan" name="lan"
                                value="{{ old('lan', $book->langauge) }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="copy" class="form-label fw-semibold">Available Copies</label>
                                <input type="number" class="form-control" id="copy" name="copy"
                                    value="{{ old('copy', $book->available_copies) }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label fw-semibold">Price</label>
                                <input type="number" step="0.01" class="form-control" id="price" name="price"
                                    value="{{ old('price', $book->price) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <select id="status" name="status" class="form-select">
                                <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>✅ Active</option>
                                <option value="0" {{ $book->status == 0 ? 'selected' : '' }}>❌ Inactive</option>
                            </select>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-success px-5 shadow-sm">
                                💾 Update Book
                            </button>
                        </div>
                    </form>

                </div>
                
            </div>
        </div>
    </div>
</div>