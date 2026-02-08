<!DOCTYPE html>
<html>
<head>
    <title>MFA Setup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

<div class="bg-white p-6 rounded shadow w-96 text-center">
    <h2 class="text-lg font-semibold mb-3">Enable Authenticator</h2>

    <img class="mx-auto mb-3"
         src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=<?= urlencode($qrUrl) ?>">

    <form method="post" action="/mfa/verify-setup">
        <?= csrf_field() ?>
        <input type="text" name="otp"
               class="border w-full p-2 mb-3 text-center"
               placeholder="6-digit code" required>

        <button class="w-full bg-green-600 text-white py-2 rounded">
            Verify & Enable
        </button>
    </form>
</div>

</body>
</html>
