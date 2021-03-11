<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            padding: 0;
            margin: 0;
        }
        html, body {
            height: 100%;
        }
        body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: #343a40;
        }
        p {
            font-size: 36px;
            font-weight: bold;
            font-family: sans-serif;
            color: white;
        }
    </style>
</head>
<body>
    <p><?php echo $_GET['msg']; ?></p>
</body>
</html>