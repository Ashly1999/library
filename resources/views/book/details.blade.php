<!-- resources/views/user-details.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e6ffe6;
            transition: 0.3s;
        }
    </style>
</head>

<body>

    <a href="" style="text-align:right;margin-left: 210px;text-decoration: none;">Book Details</a><br>
    <a href="" style="text-align:right;margin-left: 210px;text-decoration: none;">category Details</a>
    <h2>Book Details</h2>

    <table>

        <tr>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Category</th>
            <th>Publisher</th>
            <th>Year Published</th>
            <th>Edition</th>
            <th>Language</th>
            <th>Available Copies</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->category->name }}</td>
            <td>{{ $book->publisher }}</td>
            <td>{{ $book->year_publisher}}</td>
            <td>{{ $book->edition }}</td>
            <td>{{ $book->langauge }}</td>
            <td>{{ $book->available_copies }}</td>
            <td>{{ $book->status == 1 ? 'Available':'Non Available'}}</td>
            <td><a href="">Edit</a></td>
            <td><a href="{{route('delete', $book->book_id)}}">Delete</a></td>
        </tr>
        @endforeach

    </table>

</body>

</html>