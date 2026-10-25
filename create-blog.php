<?php
session_start();
include "db.php";
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$message = "";
if (isset($_POST['publish'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $author = $_SESSION['user']['username'];
    $date = date("M d, Y");

    if (!empty($title) && !empty($content)) {
        mysqli_query($conn, "INSERT INTO blogs (title, content, author, tag, created_at) VALUES ('$title', '$content', '$author', '$tag', '$date')");
        header("Location: index.php");
        exit();
    } else {
        $message = "Title and content are required!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Blog | Blog App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <nav class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center">
        <h1 class="font-bold text-xl text-indigo-400"><a href="dashboard.php">✨ BlogApp</a></h1>
        <a href="dashboard.php" class="text-sm text-slate-400 hover:text-white">← Back to Dashboard</a>
    </nav>
    <main class="max-w-2xl mx-auto px-6 py-10">
        <div class="bg-slate-800 border border-slate-700 p-8 rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold mb-6">✍️ Write a New Story</h2>
            <?php if($message): ?>
                <div class="mb-4 p-3 bg-red-500/20 border border-red-500 text-red-300 rounded-lg text-sm"><?php echo $message; ?></div>
            <?php endif; ?>
            <form method="POST" class="space-y-4">
                <div>
                    <label class="block text-xs font-semibold mb-1 text-slate-300">Story Title</label>
                    <input type="text" name="title" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1 text-slate-300">Category Tag</label>
                    <input type="text" name="tag" placeholder="e.g. Technology, Design" class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold mb-1 text-slate-300">Content</label>
                    <textarea name="content" rows="6" required class="w-full px-4 py-3 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-indigo-500 outline-none"></textarea>
                </div>
                <button type="submit" name="publish" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all shadow-lg">Publish Story</button>
            </form>
        </div>
    </main>
</body>
</html>