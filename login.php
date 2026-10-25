<?php
session_start();
include "db.php";
$error = "";

if (isset($_POST['login'])) {
    $email = strtolower(trim($_POST['email']));
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['user'] = ['username' => $row['username'], 'email' => $row['email']];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Blog App</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-white flex items-center justify-center min-h-screen">
    <div class="bg-slate-800 p-8 rounded-2xl shadow-xl w-full max-w-md border border-slate-700">
        <h2 class="text-2xl font-bold mb-6 text-center text-indigo-400">Welcome Back</h2>
        <?php if($error): ?>
            <div class="mb-4 p-3 bg-red-500/20 border border-red-500 text-red-300 rounded-lg text-sm"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold mb-1 text-slate-300">Email Address</label>
                <input type="email" name="email" required class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold mb-1 text-slate-300">Password</label>
                <input type="password" name="password" required class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-700 text-white text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
            </div>
            <button type="submit" name="login" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl transition-all shadow-lg">Sign In</button>
        </form>
        <p class="text-xs text-center text-slate-400 mt-4">Don't have an account? <a href="register.php" class="text-indigo-400 underline">Register</a></p>
    </div>
</body>
</html>