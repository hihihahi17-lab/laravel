<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link rel="stylesheet" href="form.css">
    
</head>
<body>
    
    <form action="/submit" method="POST">
        @csrf
        Name: <input type="text" name="name">
        <br>
        <br>
        Email: <input type="text" name="email">
        <br>
        <br>

                <button >submit</button>
                
    </form>
</body>
</html>