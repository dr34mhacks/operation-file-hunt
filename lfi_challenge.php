<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LFI Complex Challenge</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1620825937374-87fc7d6bddc2?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: fit;
            overflow: hidden;
        }
        .content {
            overflow-y: auto;
            max-height: 80vh;
            background-color: #ffffff;
            border-radius: 1.25rem;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="content p-8 rounded shadow-lg text-center max-w-lg w-full">
        <h1 class="text-2xl font-bold mb-4"><font color="green">LFI Not So Complex Challenge</font></h1>
        <p class="mb-4"><font color="black">Try to retrieve the content of flag.txt!</font></p>
        <form method="GET">
            <input type="text" name="input" placeholder="Enter your input" class="border p-2 rounded w-full mb-4">
            <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Include</button>
        </form>
        <div class="mt-6 text-left bg-gray-50 p-4 rounded shadow overflow-x-auto max-h-64">
            <?php
            function sanitize($input) {
                // Sanitize input by stripping certain characters
                $input = str_replace(['..', '/', '\\'], '', $input);
                return $input;
            }

            if (isset($_GET['input'])) {
                $input = $_GET['input'];
                // Decode input once
                $decoded_once = base64_decode(sanitize($input));

                // Fake check to mislead
                if (strpos($decoded_once, 'not_flag.txt') !== false) {
                    echo "<p class='text-red-500'>Error: Attempted to access a restricted file!</p>";
                    exit;
                }

                // Decode again
                $decoded_twice = base64_decode($decoded_once);

                // Final check for flag retrieval
                if ($decoded_twice === 'flag.txt') {
                    include($decoded_twice);
                } else {
                    echo "<p class='text-red-500'>Access Denied: Invalid file!</p>";
                }
            }
            ?>
        </div>
        <div class="mt-4">
            <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
</body>
</html>
