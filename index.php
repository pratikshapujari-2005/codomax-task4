<?php
session_start();
include "db.php";

if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Feed | Blog App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white min-h-screen">
    <nav class="bg-slate-800 border-b border-slate-700 px-6 py-4 flex justify-between items-center">
        <h1 class="font-bold text-xl text-indigo-400">✨ BlogApp Feed</h1>
        <div class="flex items-center gap-4">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="text-sm text-slate-300">Hi, <?php echo htmlspecialchars($_SESSION['user']['username']); ?></span>
                <a href="dashboard.php" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-xl text-sm font-semibold">Dashboard</a>
                <a href="index.php?logout=true" class="bg-red-500/20 text-red-300 border border-red-500 px-3 py-2 rounded-xl text-sm font-semibold">Logout</a>
            <?php else: ?>
                <a href="login.php" class="text-sm text-slate-300 hover:text-white">Log In</a>
                <a href="register.php" class="bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-xl text-sm font-semibold">Sign Up</a>
            <?php endif; ?>
        </div>
    </nav>
    <main class="max-w-4xl mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold mb-8">Recent Community Articles</h2>
        <div class="space-y-6">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM blogs ORDER BY id DESC");
            if (mysqli_num_rows($result) > 0) {
                while ($b = mysqli_fetch_assoc($result)) {
                    echo '
                    <div class="bg-slate-800 border border-slate-700 p-6 rounded-2xl shadow-sm space-y-3">
                        <span class="text-xs font-semibold uppercase bg-indigo-500/20 text-indigo-300 border border-indigo-500/30 px-2.5 py-1 rounded-lg">' . htmlspecialchars($b['tag']) . '</span>
                        <h3 class="text-2xl font-bold text-white">' . htmlspecialchars($b['title']) . '</h3>
                        <div class="text-xs text-slate-400">By <strong class="text-slate-200">' . htmlspecialchars($b['author']) . '</strong> • ' . htmlspecialchars($b['created_at']) . '</div>
                        <p class="text-slate-300 text-sm leading-relaxed">' . nl2br(htmlspecialchars($b['content'])) . '</p>
                    </div>';
                }
            } else {
                echo '<p class="text-slate-400 text-sm">No stories posted yet. Be the first to publish!</p>';
            }
            ?>
        </div>
    </main>
</body>
</html>