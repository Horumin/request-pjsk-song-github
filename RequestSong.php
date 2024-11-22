<?php
include 'data_pendapat.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $song = $_POST['song'];
    $diff = $_POST['diff'];

    $sqlCount = "SELECT COUNT(*) AS total FROM test1";
    $stmtCount = $pdo->query($sqlCount);
    $rowCount = $stmtCount->fetch(PDO::FETCH_ASSOC);

     if ($rowCount['total'] >= 5) {
    echo "<script>
            alert('Request sudah mencapai batas maksimum (5 req).');
            window.location.href = 'RequestSong.php';
            </script>";
            exit();
     }
    
    $sql = "INSERT INTO test1 (name, song, diff) VALUES (:name, :song, :diff)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $name, 'song' => $song, 'diff' => $diff]);


    echo "<script>
            alert('Terima kasih atas request Anda!');
            window.location.href = 'RequestSong.php';
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html langs="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <title> Horumin Live </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="logo.webp">
    <script src="script.js"></script>
</head>
<body>

<header>
    <div class="logo">
        <img src="logo.webp" alt="Lumi Logo">
    </div>
    <h1>Holumi - RequestSong</h1>
    <nav>
        <ul>
            <li><a href="#profile">Lumi Profile</a></li>
            <li><a href="#more">Lumi Media</a></li>
            <li><a href="#request">Request Song</a></li>
        </ul>
    </nav>
</header>


<section id="profile" class="profile">
    <h2>Who is Holumi?</h2>
    <p>Holumi, atau biasa dipanggil Lumi, adalah seorang konten kreator kreatif yang aktif di platform 
       <a href="https://www.tiktok.com/@holumin">TikTok</a>. Lumi dikenal karena gaya komunikasinya yang santai, 
       interaktif, dan penuh semangat. Lumi membagikan banyak konten menarik yang mencakup pengalaman bermain game, tips, dan hiburan. Konten Lumi sebagian besar berfokus pada <strong>game rhythm</strong> seperti <em>Project Sekai</em> atau 
       <em>lainnya</em>.</p>
    <img src="profile.webp" alt="Profile Lumi" class="Image-Responsive">
</section>


    <section id="more" class="more">
    <h2> Holumi Social Media </h2>
    <ul>
        <li><a href="https://www.tiktok.com/@holumin">TikTok</a></li>
        <li><a href="https://www.instagram.com/holumi.i/">Instagram</a></li>
    <h2> Follow Me! </h2>
        <li><a href="https://saweria.co/holumi">Saweria</a></li>
        <li><a href="https://discord.com/invite/d7gbBUZCfR">Discord</a></li>
    </ul>
    </section>

    <section id="request" class="request">
    <div class="container">
    <h2> Add Request </h2>
    <form name="userForm" action="" method="POST" onsubmit="return validateForm()">
        <label>TikTok Name:</label>
        <input type="text" name="name" require><br>
        <label>Song Name:</label>
        <input type="text" name="song" require><br>
        <label for="diff">Tingkat Kesulitan:</label>
        <select id="diff" name="diff">
            <option value="Easy">Easy</option>
            <option value="Normal">Normal</option>
            <option value="Hard">Hard</option>
            <option value="Extreme">Extreme</option>
            <option value="Master">Master</option>
            <option value="Append">Append</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    </section>

<footer id="contact">
    <div class="footer-info">
        <h2>Kontak Kami</h2>
        <p>TikTok: @horumin</p>
    </div>
</footer>
</body>
</html>