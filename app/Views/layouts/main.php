<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'CHECHA RANKS' ?></title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts: Montserrat and Bebas Neue -->
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #212121;
            color: #ffffff;
            font-family: 'Montserrat', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Bebas Neue', sans-serif;
        }
        .navbar-brand {
            font-family: 'Bebas Neue', sans-serif;
        }
        .table {
            background-color: #333333;
            color: #ffffff;
        }
        .table th, .table td {
            border-color: #555555;
        }
        .modal-dialog-start {
            position: fixed;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CHECHA RANKS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/confederaciones">Confederaciones</a>
                    </li>
                    <!-- Agregar más enlaces según módulos -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <?= $this->renderSection('content') ?>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ChechaAlert system placeholder -->
    <script>
        // Placeholder for ChechaAlert notifications
        function chechaAlert(message, type = 'info') {
            // Implement notification system
            alert(message);
        }
    </script>
</body>
</html>