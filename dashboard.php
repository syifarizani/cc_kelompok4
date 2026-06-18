<?php
session_start();
include 'koneksi.php';

// Proteksi: Jika mencoba bypass tanpa login, paksa kembali ke index
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Menarik data nama anggota tim secara real-time dari database pusat [cite: 23]
$query = "SELECT * FROM anggota";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Informasi Kelompok</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-purple-50 to-rose-100 min-h-screen flex flex-col justify-between font-sans">

    <header class="p-6 max-w-4xl mx-auto w-full flex justify-between items-center">
        [cite_start]<div class="text-xs font-black text-gray-400 uppercase tracking-widest bg-white/40 px-3 py-1.5 rounded-xl border border-white/40">Dashboard Pusat [cite: 22]</div>
        <a href="logout.php" class="px-5 py-2.5 bg-white hover:bg-rose-50 text-rose-500 text-xs font-bold rounded-xl border border-pink-200 transition-all duration-300 shadow-sm hover:shadow shadow-rose-100 tracking-wider uppercase">
            Keluar App
        </a>
    </header>

    <main class="max-w-4xl mx-auto w-full px-6 flex-grow flex items-center justify-center">
        <div class="bg-white/80 backdrop-blur-md w-full p-10 rounded-[2.5rem] shadow-2xl shadow-rose-200/30 border border-white/60 space-y-8">
            
            <div class="text-center space-y-4">
                <h1 class="text-3xl font-black text-gray-800 tracking-tight lg:text-4xl">Profil Kontributor Kelompok 4</h1>
                
                <div class="inline-flex items-center gap-2.5 bg-gradient-to-r from-rose-500 to-pink-500 text-white text-[10px] px-5 py-2 rounded-full font-black uppercase tracking-widest shadow-lg shadow-rose-500/30">
                    <span class="opacity-75">Live Traffic Route:</span>
                    <span class="bg-white/20 px-2 py-0.5 rounded-md border border-white/20">Instance 1</span>
                </div>
            </div>

            <div class="grid gap-4 sm:grid-gap-4">
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <div class="flex justify-between items-center p-5 bg-white/50 border border-pink-100/70 rounded-2xl hover:bg-white hover:border-pink-300 hover:shadow-md hover:shadow-rose-100/30 transition-all duration-300 transform hover:-translate-y-0.5">
                            <div class="space-y-1.5">
                                <h3 class="font-extrabold text-gray-800 text-base lg:text-lg tracking-tight"><?php echo $row['nama']; ?></h3>
                                <p class="text-xs text-rose-400 font-mono font-bold tracking-widest uppercase bg-rose-50/60 inline-block px-2.5 py-0.5 rounded-md border border-rose-100/40"><?php echo $row['nim']; ?></p>
                            </div>
                            <div class="w-3 h-3 rounded-full bg-gradient-to-br from-rose-400 to-pink-400 shadow-md shadow-rose-300"></div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="text-center text-gray-400 text-sm py-8 font-medium">
                        ⚠️ Koneksi berhasil, namun tabel data 'anggota' di database kosong.
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </main>

    <footer class="p-6 text-center text-xs font-bold text-gray-400/80 tracking-wide">
        Telkom University &bull; Infrastruktur Cloud Terdistribusi 2026
    </footer>

</body>
</html>
