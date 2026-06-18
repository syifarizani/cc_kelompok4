<?php
session_start();
include 'koneksi.php';

// Jika terdeteksi user sudah login, langsung alihkan ke dashboard pusat
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}

$error = "";
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Mengecek keaslian akun ke Database Server terpusat
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Username atau password salah! Sila periksa kembali.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Besar Komputasi Awan - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 via-purple-50 to-rose-100 min-h-screen flex flex-col justify-between font-sans">

    <header class="p-6 flex justify-between items-center max-w-6xl mx-auto w-full">
        <div class="text-2xl font-black text-rose-500 tracking-widest bg-white/60 px-4 py-2 rounded-2xl border border-pink-100/50 backdrop-blur-sm shadow-sm">CLOUD.4</div>
        <div class="text-xs text-rose-400 font-bold tracking-wider uppercase bg-rose-50 border border-rose-100 px-3 py-1.5 rounded-full">Telkom University</div>
    </header>

    <main class="max-w-6xl mx-auto w-full px-6 py-8 flex flex-col lg:flex-row items-center justify-between gap-12 flex-grow">
        
        <div class="lg:w-1/2 space-y-6 text-center lg:text-left">
            <span class="inline-block bg-gradient-to-r from-rose-400 to-pink-500 text-white text-xs px-4 py-1.5 rounded-full font-bold uppercase tracking-widest shadow-md shadow-rose-400/20">
                Tugas Besar &bull; BBK3CAB3
            </span>
            <h1 class="text-4xl lg:text-6xl font-extrabold text-gray-800 leading-tight">
                Arsitektur <br class="hidden lg:inline"><span class="bg-gradient-to-r from-rose-500 to-pink-500 bg-clip-text text-transparent">High Availability</span>
            </h1>
            <p class="text-gray-600 text-lg leading-relaxed max-w-lg mx-auto lg:mx-0">
                [cite_start]Sistem infrastruktur berbasis cloud dengan implementasi multi-instance web server, pembagian beban trafik otomatis, dan kluster database terpisah[cite: 4, 7, 25, 26].
            </p>
            <div class="pt-2 flex flex-wrap justify-center lg:justify-start gap-3 text-xs font-semibold text-gray-500">
                [cite_start]<span class="bg-white/80 border border-pink-100 px-3 py-2 rounded-xl shadow-sm">⚡ Amazon EC2 [cite: 24, 81]</span>
                [cite_start]<span class="bg-white/80 border border-pink-100 px-3 py-2 rounded-xl shadow-sm">🛡️ Load Balancer [cite: 7, 25]</span>
                [cite_start]<span class="bg-white/80 border border-pink-100 px-3 py-2 rounded-xl shadow-sm">🗄️ Dedicated DB Server [cite: 6, 26]</span>
            </div>
        </div>

        <div class="lg:w-5/12 w-full max-w-md bg-white/80 backdrop-blur-md p-10 rounded-[2.5rem] shadow-2xl shadow-rose-200/40 border border-white/60">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-gray-800 tracking-tight">Sign In</h2>
                [cite_start]<p class="text-gray-400 text-sm mt-2">Gunakan kredensial kelompok untuk otentikasi [cite: 22]</p>
            </div>

            <?php if($error != ""): ?>
                <div class="bg-rose-50 border border-rose-100 text-rose-500 text-xs p-4 rounded-2xl mb-6 text-center font-semibold animate-bounce">
                    ❌ <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST" class="space-y-6">
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2.5 ml-1">Username</label>
                    <input type="text" name="username" required placeholder="Masukkan username" 
                           class="w-full px-5 py-4 bg-pink-50/30 border border-pink-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-rose-300 focus:bg-white text-gray-700 font-medium transition duration-300 placeholder-gray-300">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2.5 ml-1">Password</label>
                    <input type="password" name="password" required placeholder="••••••••" 
                           class="w-full px-5 py-4 bg-pink-50/30 border border-pink-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-rose-300 focus:bg-white text-gray-700 font-medium transition duration-300 placeholder-gray-300">
                </div>
                <button type="submit" name="login" 
                        class="w-full py-4 bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-600 hover:to-pink-600 text-white font-bold rounded-2xl shadow-xl shadow-rose-500/20 transition duration-300 transform active:scale-[0.98] tracking-wider uppercase text-sm">
                    Log In
                </button>
            </form>
        </div>
    </main>

    <footer class="p-6 text-center text-xs font-semibold text-gray-400 tracking-wide">
        &copy; 2026 Kelompok 4 &bull; Komputasi Awan Kelas BBK3CAB3
    </footer>

</body>
</html>
