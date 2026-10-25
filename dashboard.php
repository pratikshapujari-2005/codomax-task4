<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Blog App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <nav class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center">
        <h1 class="font-bold text-xl text-indigo-400">✨ BlogApp Dashboard</h1>
        <div class="flex items-center gap-4">
            <span class="text-sm text-slate-300">Hello, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></span>
            <a href="create-blog.php" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-xl text-sm font-semibold">Write Story</a>
            <a href="index.php?logout=true" class="bg-red-500/20 text-red-300 border border-red-500 px-3 py-2 rounded-xl text-sm font-semibold">Logout</a>
        </div>
    </nav>
    <main class="max-w-4xl mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold mb-6">Your Publishing Hub</h2>
        <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl">
            <p class="text-slate-400 text-sm">Welcome to your author dashboard! From here you can navigate to create new stories or view published community articles on the main feed.</p>
            <div class="mt-6 flex gap-4">
                <a href="create-blog.php" class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-sm font-semibold rounded-xl">Create New Post</a>
                <a href="index.php" class="px-5 py-2.5 bg-slate-700 hover:bg-slate-600 text-sm font-semibold rounded-xl">View Public Feed</a>
            </div>
        </div>
    </main>
</body>
</html>