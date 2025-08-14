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

    <a href="" style="text-align:right;margin-left: 210px;text-decoration: none;">Book Details</a>
    <h2>User Details</h2>

    <table>

        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>membership_no</th>
            <th>Address</th>
            <th>Profile</th>
            <th>Status</th>
            <th>Join Date</th>
            <th>Issue Date</th>
            <th>Due Date</th>
        </tr>

        @foreach($user as $use)
        <tr>
            <td>{{$use->name }}</td>
            <td>{{$use->email }}</td>
            <td>{{$use->membership_no }}</td>
            <td>{{$use->address}}</td>
            <td>
                <img src="{{ asset($use->image) }}" alt="User Image" width="100">
            </td>

            <td>{{$use->status}}</td>
            <td>{{$use->join_date}}</td>
            <td>{{$use->idate}}</td>
            <td>{{$use->ddate}}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>