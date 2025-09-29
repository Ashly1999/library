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
        <h2 class="form-title"> Add New Item</h2>
        <form method="POST" action="{{route('item.create')}}">
            @csrf
            <div class="mb-3">
                <label for="bname" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter item name">
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Item Code</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Enter item code">
            </div>


          

            <div class="d-grid">
                <button type="submit" class="btn btn-custom">Save Item</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>