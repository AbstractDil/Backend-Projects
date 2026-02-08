<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form method="post" class="bg-white p-6 rounded shadow w-80">
    <?= csrf_field() ?>
    <h2 class="text-xl font-semibold mb-4 text-center">Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <p class="text-red-500 mb-2"><?= session('error') ?></p>
    <?php endif; ?>

    <input type="email" name="email" class="w-full border p-2 mb-3" placeholder="Email" required>
    <input type="password" name="password" class="w-full border p-2 mb-3" placeholder="Password" required>

    <button class="w-full bg-blue-600 text-white py-2 rounded">
        Login
    </button>
</form>

</body>
</html>
