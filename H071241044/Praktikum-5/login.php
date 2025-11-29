<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-sky-400 to-indigo-600">

    <div class="flex justify-center items-center min-h-screen">

        <div class="w-full max-w-sm">
            <form action="proses_login.php" method="POST"
                  class="bg-white/20 backdrop-blur-lg shadow-xl rounded-xl px-8 pt-6 pb-8 mb-4">

                <h1 class="text-center text-3xl font-bold text-white mb-8">
                    Login to Your Account
                </h1>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="bg-red-500/50 border border-red-400 text-white p-4 mb-6 rounded-lg" role="alert">
                        <p class="font-bold text-center"><?php echo $_SESSION['error']; ?></p>
                    </div>
                    <?php
                        unset($_SESSION['error']);
                    ?>
                <?php endif; ?>

                <div class="mb-5">
                    <label for="username" class="block text-gray-200 text-sm font-bold mb-2">
                        Username
                    </label>
                    <input type="text" id="username" name="username" placeholder="Enter your username"
                           class="bg-white/10 border border-white/40 text-white placeholder-gray-300 text-sm rounded-lg focus:ring-sky-300 focus:border-sky-300 block w-full p-2.5 transition duration-300">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-200 text-sm font-bold mb-2">
                        Password
                    </label>
                    <input type="password" id="password" name="password" placeholder="•••••••••"
                           class="bg-white/10 border border-white/40 text-white placeholder-gray-300 text-sm rounded-lg focus:ring-sky-300 focus:border-sky-300 block w-full p-2.5 transition duration-300">
                </div>

                <div class="pt-4">
                    <button type="submit"
                            class="w-full text-white bg-sky-500 hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-300">
                        Sign In
                    </button>
                </div>

            </form>
            <p class="text-center text-gray-300 text-xs">
                &copy;2025 Your Company. All rights reserved.
            </p>
        </div>

    </div>

</body>
</html>