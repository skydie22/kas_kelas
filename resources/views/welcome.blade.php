<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kas Kelas</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">Kas Kelas</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/home') }}">Login</a>
                            </li>
        
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <section id="hero" class='position-relative d-flex align-items-center justify-content-center'>
            <div class="container" style="z-index: 3">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="text-center"><br>
                            <h1>Welcome to Kas Kelas</h1>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-3 col-6 py-4">
                                        <h3>@currency($kasMasuk)</h3>
                                        <h6>Total Kas Masuk</h6>
                                    </div>
                                    <div class="col-md-3 col-6 py-4">
                                        <h3>@currency($kasPengeluaran)</h3>
                                        <h6>Total Kas Keluar</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>

    </div>
</body>
</html>