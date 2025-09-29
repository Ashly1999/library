<!DOCTYPE html>
<html>

<head>
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


    <div class="container mt-5">

        <div style="text-align: right; margin: 10px 0;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>


        <td><a href="{{route('details')}}" style="background-color: rgba(109, 58, 186, 1); color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;">
                Back
            </a>
        </td>
        <h2>Category Details</h2>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>

                    <th>Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cat as $cats)
                <tr>
                    <td>{{$cats->name }}</td>
                    <td>{{$cats->description }}</td>
                    <td>{{$cats->status ? 'Active' : 'Inactive' }}</td>
                    <td><a href="{{route('catedit',$cats->category_id)}}" style="background-color: #007bff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">
                            Edit
                        </a>

                        <a href="{{route('catdelete',$cats->category_id)}}" style="background-color: #620404ff; color: white; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Delete</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No users found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>