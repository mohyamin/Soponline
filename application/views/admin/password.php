<!-- application/views/change_password.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Change Password</title>
    <style>
        .container {
            max-width: 50px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            color: #666;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Change Password</h2>
    <?php echo form_open('change/change_password'); ?>

    <label for="new_password">New Password</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Confirm New Password</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Change Password">

    <?php echo form_close(); ?>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Menggunakan JavaScript untuk menampilkan alert
    window.onload = function() {
        document.getElementById('success-alert').style.display = 'block';
    };
</script>

</html>