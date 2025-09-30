<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f9fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        form table {
            width: 100%;
            border-collapse: collapse;
        }

        form td {
            padding: 10px 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        label {
            font-weight: bold;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Change Password</h2>
        <form method="post" action="">
            @csrf
            <table>
                <tr>
                    <td><label for="new_pass">New Password:</label></td>
                    <td><input type="password" id="new_pass" name="new_pass" placeholder="Enter new password"></td>
                </tr>
                <tr>
                    <td><label for="con_pass">Confirm Password:</label></td>
                    <td><input type="password" id="con_pass" name="con_pass" placeholder="Confirm new password"></td>
                </tr>
            </table>
            <button type="submit">Save</button>
        </form>
    </div>
</body>

</html>