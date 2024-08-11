<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local File Inclusion</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1563740287374-d1a78b4d82cb?q=80&w=2190&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
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
        <h1 class="text-2xl font-bold mb-4"><font color="green">Local File Inclusion</font></h1>
        <p class="mb-4">Enter a page to include:</p>
        <form method="GET">
            <input type="text" name="page" placeholder="Enter page name or file path" class="border p-2 rounded w-full mb-4">
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
        <div class="mt-6 text-left bg-gray-50 p-4 rounded shadow overflow-x-auto max-h-64">
            <?php
            // Define the path for the log file
            $logFile = __DIR__ . '/logs/access.log';

            // Function to log access attempts
            function log_access($file) {
                global $logFile;
                $userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';
                $logEntry = sprintf(
                    "[%s] %s %s %s\n",
                    date('Y-m-d H:i:s'),
                    $_SERVER['REMOTE_ADDR'],  // Log IP address of the client
                    $file,
                    $userAgent
                );
                file_put_contents($logFile, $logEntry, FILE_APPEND);
            }

            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                // Log the access attempt
                log_access($page);

                // Directly include the user input, demonstrating a vulnerable setup
                // WARNING: This is insecure and should only be used for demonstration
                include($page);
            }
            ?>
        </div>
        <div class="mt-4">
            <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</a>
        </div>
    </div>
</body>
</html>
