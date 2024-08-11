<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbitrary File Retrieval</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1499084732479-de2c02d45fcc?q=80&w=1931&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
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
        <h1 class="text-2xl font-bold mb-4"><font color="green">Arbitrary File Retrieval</font></h1>
        <p class="mb-4">Enter a file path to retrieve its contents:</p>
        <form method="GET">
            <input type="text" name="file" placeholder="Enter file path" class="border p-2 rounded w-full mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Retrieve</button>
        </form>
        <div class="mt-6 text-left bg-gray-50 p-4 rounded shadow overflow-x-auto max-h-64">
            <?php
            if (isset($_GET['file'])) {
                $file = $_GET['file'];

                if (file_exists($file)) {
                    echo '<pre>' . htmlspecialchars(file_get_contents($file)) . '</pre>';
                } else {
                    echo "<p class='text-red-500'>File not found.</p>";
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
