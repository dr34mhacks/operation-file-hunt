<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operation File Hunt</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {	
            background-image: url('https://images.unsplash.com/photo-1535013113415-b315146c67d5?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }
        .content {
            background-color: #ffffff;
            border-radius: 1.25rem;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="content p-8 rounded shadow-lg text-center max-w-lg w-full">
        <h1 class="text-2xl font-bold mb-4"><font color="green">Operation File Hunt</font></h1>
        <p class="mb-6">Choose a vulnerability to explore:</p>
        <div class="flex flex-col space-y-4">
            <a href="arbitrary_file_retrieval.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Arbitrary File Retrieval</a>
            <a href="local_file_inclusion.php" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Local File Inclusion</a>
            <a href="lfi_challenge.php" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Retrieve Flag</a>
        </div>
    </div>
</body>
</html>
