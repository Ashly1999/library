@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Book</h2>
    <form action="{{ route('update', $book->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="bname" class="form-label">Book Title</label>
            <input type="text" class="form-control" id="bname" name="bname" value="{{ old('bname', $book->title) }}">
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select id="category_id" name="category_id" class="form-select">
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->category_id }}" {{ $book->category_id == $cat->category_id ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="publisher" class="form-label">Publisher</label>
            <input type="text" class="form-control" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}">
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year Published</label>
            <input type="number" class="form-control" id="year" name="year" value="{{ old('year', $book->year_publisher) }}">
        </div>

        <div class="mb-3">
            <label for="edition" class="form-label">Edition</label>
            <input type="text" class="form-control" id="edition" name="edition" value="{{ old('edition', $book->edition) }}">
        </div>

        <div class="mb-3">
            <label for="lan" class="form-label">Language</label>
            <input type="text" class="form-control" id="lan" name="lan" value="{{ old('lan', $book->language) }}">
        </div>

        <div class="mb-3">
            <label for="copy" class="form-label">Available Copies</label>
            <input type="number" class="form-control" id="copy" name="copy" value="{{ old('copy', $book->available_copies) }}">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $book->price) }}">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select">
                <option value="1" {{ $book->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $book->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
    </form>

    <hr>

    <p><strong>Current Category:</strong> {{ $book->category?->name ?? 'No Category' }}</p>
</div>
@endsection