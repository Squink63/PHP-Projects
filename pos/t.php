<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role and Permission Selection</title>
</head>
<body>
    <form action="p.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Role/Resource</th>
                    <th>Read</th>
                    <th>Create</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Admin</td>
                    <td><input type="checkbox" name="permissions[admin][read]" value="1"></td>
                    <td><input type="checkbox" name="permissions[admin][create]" value="1"></td>
                    <td><input type="checkbox" name="permissions[admin][update]" value="1"></td>
                    <td><input type="checkbox" name="permissions[admin][delete]" value="1"></td>
                </tr>
                <tr>
                    <td>Editor</td>
                    <td><input type="checkbox" name="permissions[editor][read]" value="1"></td>
                    <td><input type="checkbox" name="permissions[editor][create]" value="1"></td>
                    <td><input type="checkbox" name="permissions[editor][update]" value="1"></td>
                    <td><input type="checkbox" name="permissions[editor][delete]" value="1"></td>
                </tr>
                <tr>
                    <td>User</td>
                    <td><input type="checkbox" name="permissions[user][read]" value="1"></td>
                    <td><input type="checkbox" name="permissions[user][create]" value="1"></td>
                    <td><input type="checkbox" name="permissions[user][update]" value="1"></td>
                    <td><input type="checkbox" name="permissions[user][delete]" value="1"></td>
                </tr>
            </tbody>
        </table>
        <select class="float-end" name="role" id="role">
            
            <option>1</option>
            <option>2</option>
            <option>3</option>
            
        </select>

        <button type="submit">Submit</button>
    </form>
</body>
</html>