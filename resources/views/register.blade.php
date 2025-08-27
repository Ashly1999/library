<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Create an Account</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name">
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="membership_no" class="form-label">Membership No</label>
                                <input type="text" class="form-control" id="membership_no" name="membership_no" value="1200">
                            </div>


                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" maxlength="15"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Profile:</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="mb-3">
                                <label for="book_id" class="form-label">Book</label>
                                <select id="book_id" name="book_id" class="form-select">
                                    <option value="">-- Select Book --</option>
                                    @foreach($books as $book)
                                    <option value="{{ $book->book_id }}">{{ $book->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1">Assigned</option>
                                    <option value="0">Not Assigned</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Join Date:</label>
                                <input type="date" class="form-control" id="jdate" name="jdate">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Issue Date:</label>
                                <input type="date" class="form-control" id="idate" name="idate">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Due Date:</label>
                                <input type="date" class="form-control" id="ddate" name="ddate">
                            </div>
                            <!-- Register Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        Already have an account? <a href="{{route('login')}}">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>