<!DOCTYPE html>
<html>
<head>
    <title>MFA Verification</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="bg-white p-6 rounded-lg shadow w-full max-w-sm">
    <h2 class="text-lg font-semibold mb-4">Verify Authenticator</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="mb-3 text-red-600">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/mfa/verify-challenge">
        <?= csrf_field() ?>

        <input type="text" name="otp"
               placeholder="6-digit code"
               class="w-full border rounded px-3 py-2 mb-4"
               required>

        <button class="w-full bg-indigo-600 text-white py-2 rounded">
            Verify
        </button>
    </form>
</div>

</body>
</html>
