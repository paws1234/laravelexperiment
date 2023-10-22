<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }

        .payment-form label {
            display: block;
            margin-bottom: 10px;
        }

        .payment-form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .payment-form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .payment-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="payment-form">
        <h2>Payment</h2>
        <form method="POST" action="{{ route('payments.store') }}">
            @csrf
            <div class="form-group">
                <label for="amount">Payment Amount:</label>
                <input type="text" name="amount" id="amount" placeholder="Enter the payment amount" required>
            </div>
            

            <button type="submit">Submit Payment</button>
        </form>
    </div>
</body>
</html>
