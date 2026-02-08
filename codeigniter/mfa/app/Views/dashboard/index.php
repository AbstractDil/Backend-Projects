<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>

        <!-- MFA STATUS BADGE -->
        <?php if (session('mfa_enabled')): ?>
            <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                MFA Enabled
            </span>
        <?php else: ?>
            <span class="px-3 py-1 text-sm rounded-full bg-red-100 text-red-700">
                MFA Disabled
            </span>
        <?php endif; ?>
    </div>

    <!-- SUCCESS MESSAGE -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="mb-4 bg-green-50 border border-green-300 text-green-700 px-4 py-3 rounded">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <!-- ERROR MESSAGE -->
    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-4 bg-red-50 border border-red-300 text-red-700 px-4 py-3 rounded">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <p class="text-gray-600 mb-6">
        Welcome! You have successfully logged in.
    </p>

    <!-- ACTION BUTTONS -->
    <div class="flex flex-col gap-3">

        <?php if (!session('mfa_enabled')): ?>
            <a href="/mfa/setup"
               class="w-full text-center bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Enable Authenticator (Google / Microsoft)
            </a>
        <?php else: ?>
            <a href="/mfa/verify"
               class="w-full text-center bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition">
                Verify MFA
            </a>
        <?php endif; ?>

        <a href="/logout"
           class="w-full text-center bg-gray-200 text-gray-800 py-2 rounded hover:bg-gray-300 transition">
            Logout
        </a>
    </div>

</div>

</body>
</html>
