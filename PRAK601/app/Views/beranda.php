<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - Praktikum 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Praktikum Modul 6</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="/">Beranda</a>
                <a class="nav-link" href="/profil">Profil</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body text-center p-5">
                <h1 class="display-5 fw-bold">Selamat Datang di Halaman Beranda!</h1>
                <p class="lead mt-3">Website ini mengimplementasikan konsep MVC. Data di bawah ini diambil langsung dari Model:</p>
                <hr class="w-25 mx-auto my-4">
                <h3 class="text-primary"><?= $nama; ?></h3>
                <h4 class="text-secondary"><?= $nim; ?></h4>
            </div>
        </div>
    </div>

</body>
</html>