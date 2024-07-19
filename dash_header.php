<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kimeto</title>
        <link rel="stylesheet" href="design/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="design/assets/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="design/assets/css/animate.min.css">
        <link rel="stylesheet" href="design/assets/css/style.css">

        <!-- bootstrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head>

    <body style="background-color:#000; color:white">

        <nav class="navbar navbar-expand-lg fixed-top custom-nav sticky " style="background-color:#000;">
            <div class="container">
                <a class='navbar-brand logo' href='index_1.html'>
                        <h1 style="color: #fff; font-size: 1.8rem;">Kimeto</h1>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="mdi mdi-menu"></i>
                    </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/create_post.php" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Achievements</a>
                        </li>
                        <li class="nav-item">
                            <a href="/blog.php" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        // Get the current URL path and find the corresponding link
        var path = window.location.pathname;
        console.log(path);  
        $('.navbar-nav a').each(function() {
            var href = $(this).attr('href');
            if (path === href) {
                $(this).closest('li').addClass('active');
            }
        });
    });
</script>