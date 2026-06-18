<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesi Selesai</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta http-equiv="refresh" content="3;url=index.php">
</head>
<body class="bg-gradient-to-br from-pink-50 via-purple-50 to-rose-100 min-h-screen flex items-center justify-center p-6 font-sans">

    <div class="bg-white/80 backdrop-blur-md p-10 rounded-[2.5rem] shadow-2xl shadow-rose-200/30 border border-white/60 max-w-sm w-full text-center space-y-6">
        <div class="w-20 h-20 bg-gradient-to-br from-rose-50 to-pink-100 text-rose-500 rounded-3xl flex items-center justify-center mx-auto text-3xl shadow-inner border border-pink-100/50">
            👋
        </div>
        <div class="space-y-2">
            <h1 class="text-3xl font-black text-gray-800 tracking-tight">Sesi Berakhir</h1>
            <p class="text-gray-400 text-sm leading-relaxed font-medium">
                Sesi kontribusi berhasil ditutup dengan aman. Terima kasih!
            </p>
        </div>
        
        <div class="w-full bg-pink-100 h-2 rounded-full overflow-hidden shadow-inner">
            <div class="bg-gradient-to-r from-rose-400 to-pink-500 h-full rounded-full animate-[pulse_1s_infinite] w-full origin-left"></div>
        </div>
        
        <p class="text-[10px] uppercase font-black tracking-widest text-rose-400 animate-pulse">Mengalihkan ke Portal Utama...</p>
    </div>

</body>
</html>
