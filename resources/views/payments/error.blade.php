<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
</head>
<body>
    <div class="container">
        <h1>Error Occurred</h1>
        <p>Sorry, an error has occurred while processing your payment.</p>
        <p>Please contact our support team for assistance.</p>
        

        <a href="{{ route('products.index') }}" class="btn btn-primary">Go to Product List</a>
    </div>
</body>
</html>
