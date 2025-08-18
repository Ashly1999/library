<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 25px;
            color: #343a40;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2 class="form-title">Add New Category</h2>
        <form method="post" action="{{route('catupdate',$cat->category_id)}}">
            @csrf
            <div class="mb-3">
                <label for="cname" class="form-label">Name</label>
                <input type="text" class="form-control" id="cname" name="cname" value="{{$cat->name}}" placeholder="Enter category name">
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Description</label>
                <textarea class="form-control" id="des" name="des" rows="4" placeholder="Enter description">{{$cat->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="1" {{$cat->status == 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$cat->status == 0 ? 'selected' : ''}}>Inactive</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Save</button>
            </div>
               
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>