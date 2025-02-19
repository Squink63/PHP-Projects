<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Selected Value</title>
    <script>
        function sendData() {
            var role = document.getElementById('role').value;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '', true); // Post to the same file
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the content of the div with the response from PHP
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
            };
            xhr.send('role=' + encodeURIComponent(role));
        }

        window.onload = function() {
            document.getElementById('role').addEventListener('change', sendData);
        };
    </script>
</head>
<body>
    <form method="POST" action="">
        <select class="float-end" name="role" id="role">
            <option value="">Select a role</option>  
            <option value="Admin">Admin</option>  
            <option value="Manager">Manager</option>
            <option value="User">User</option>
        </select>
    </form>

    <div id="result">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $role = isset($_POST['role']) ? $_POST['role'] : '';
            echo 'Selected role: ' . htmlspecialchars($role);
        }
        ?>
    </div>
</body>
</html>