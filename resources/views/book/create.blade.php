<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ece9e6, #ffffff);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-container {
            max-width: 650px;
            margin: 60px auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 8px 25px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0px 12px 35px rgba(0, 0, 0, 0.15);
        }

        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #0d6efd;
            font-weight: 700;
            font-size: 28px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px 15px;
            font-size: 15px;
        }

        .btn-custom {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            border: none;
            font-size: 18px;
            padding: 12px;
            border-radius: 12px;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
        }

        .btn-custom:hover {
            background: linear-gradient(90deg, #6610f2, #0d6efd);
            transform: scale(1.03);
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">📚 Add New Book</h2>
        <form method="post" action="{{route('bookstore')}}">
            @csrf
            <div class="mb-3">
                <label for="bname" class="form-label">Book Name</label>
                <input type="text" class="form-control" id="bname" name="bname" placeholder="Enter book name">
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author name">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-select">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Enter publisher">
            </div>

            <div class="mb-3">
                <label for="year" class="form-label">Year Published</label>
                <input type="number" class="form-control" id="year" name="year" placeholder="Enter year (e.g. 2023)">
            </div>

            <div class="mb-3">
                <label for="edition" class="form-label">Edition</label>
                <input type="text" class="form-control" id="edition" name="edition" placeholder="Enter edition">
            </div>

            <div class="mb-3">
                <label for="lan" class="form-label">Language</label>
                <input type="text" class="form-control" id="lan" name="lan" placeholder="Enter language">
            </div>

            <div class="mb-3">
                <label for="copy" class="form-label">Available Copies</label>
                <input type="number" class="form-control" id="copy" name="copy" placeholder="Enter number of copies">
            </div>

            <div class="mb-3">
                <label for="copy" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="1">Available</option>
                    <option value="0">Non Available</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-custom">💾 Save Book</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>