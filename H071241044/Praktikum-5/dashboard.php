<?php
session_start();


if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}


require 'data.php';


$loggedInUser = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/heroicons/2.0.16/24/outline/arrow-left-on-rectangle.svg" rel="stylesheet">
</head>
<body class="bg-gradient-to-b from-sky-50 to-gray-100 min-h-screen">

    <nav class="bg-gradient-to-r from-sky-500 to-indigo-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-white">Dashboard</h1>
                </div>
                <div class="flex items-center">
                    <span class="text-white text-md mr-4">
                        Halo, <strong class="font-semibold"><?php echo htmlspecialchars($loggedInUser['name']); ?></strong>!
                    </span>
                    <a href="logout.php" class="bg-white/20 hover:bg-white/30 text-white font-bold py-2 px-4 rounded-lg transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white p-6 sm:p-8 rounded-xl shadow-lg">

            <?php if ($loggedInUser['username'] === 'adminxxx'): ?>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Daftar Semua Pengguna</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="py-3 px-6">Nama</th>
                                <th scope="col" class="py-3 px-6">Username</th>
                                <th scope="col" class="py-3 px-6">Email</th>
                                <th scope="col" class="py-3 px-6">Fakultas</th>
                                <th scope="col" class="py-3 px-6">Angkatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                            <tr class="bg-white border-b hover:bg-gray-50 transition">
                                <td class="py-4 px-6 font-medium text-gray-900"><?php echo $user['name']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['username']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['email']; ?></td>
                                <td class="py-4 px-6"><?php echo $user['faculty'] ?? '-'; ?></td>
                                <td class="py-4 px-6"><?php echo $user['batch'] ?? '-'; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php else: ?>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Profil Saya</h2>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Nama Lengkap</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $loggedInUser['name']; ?></dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Username</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $loggedInUser['username']; ?></dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Alamat Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $loggedInUser['email']; ?></dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Jenis Kelamin</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $loggedInUser['gender']; ?></dd>
                        </div>
                         <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Fakultas</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $loggedInUser['faculty']; ?></dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Angkatan</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?php echo $loggedInUser['batch']; ?></dd>
                        </div>
                    </dl>
                </div>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>