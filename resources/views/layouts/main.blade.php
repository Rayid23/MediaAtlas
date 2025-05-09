<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Media Atlas</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-icons.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/slick.css') }}"/>

    <link href="{{ asset('css/tooplate-little-fashion.css') }}" rel="stylesheet">

</head>

<body>

{{--<section class="preloader">--}}
{{--    <div class="spinner">--}}
{{--        <span class="sk-inner-circle"></span>--}}
{{--    </div>--}}
{{--</section>--}}

<main>

    <nav class="navbar navbar-expand-lg"
         style="background-color: #1a1a1a; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-bottom: 2px solid #ff4500;">

        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#">
                <strong><span>Media Atlas</span></strong>
            </a>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#about.html">Books</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#products.html">Videos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#faq.html">Audio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#faq.html">Comics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact.html">Contact</a>
                    </li>
                </ul>

                <a href="#login" class="btn text-primary">Login</a>
                <a href="#register" class="btn text-primary">Sign up</a>

            </div>
        </div>
    </nav>

    <section class="slick-slideshow">

        <div class="container">
            <div class="row">
                <div class="col-8 offset-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">GENRES</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $model)
                            <tr>
                                <td>{{ $model->id }}</td>
                                <td>{{ $model->name }}</td>
                                <td>
                                    @foreach($model->contents as $content)
                                        {{ $content->title }}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>


</main>

<footer class="site-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-10 me-auto mb-4">
                <h4 class="text-white mb-3"><a href="#index.html">Media</a> Atlas</h4>
                <p class="copyright-text text-muted mt-lg-5 mb-4 mb-lg-0">Copyright © 2022 <strong>Little
                        Fashion</strong></p>
                <br>
                <p class="copyright-text">Designed by <a href="#https://www.tooplate.com/" target="_blank">Tooplate</a>
                </p>
            </div>

            <div class="col-lg-5 col-8">
                <h5 class="text-white mb-3">Sitemap</h5>

                <ul class="footer-menu d-flex flex-wrap">
                    <li class="footer-menu-item"><a href="#about.html" class="footer-menu-link">Story</a></li>

                    <li class="footer-menu-item"><a href="##" class="footer-menu-link">Products</a></li>

                    <li class="footer-menu-item"><a href="##" class="footer-menu-link">Privacy policy</a></li>

                    <li class="footer-menu-item"><a href="##" class="footer-menu-link">FAQs</a></li>

                    <li class="footer-menu-item"><a href="##" class="footer-menu-link">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-4">
                <h5 class="text-white mb-3">Social</h5>

                <ul class="social-icon">

                    <li><a href="##" class="social-icon-link bi-youtube"></a></li>

                    <li><a href="##" class="social-icon-link bi-whatsapp"></a></li>

                    <li><a href="##" class="social-icon-link bi-instagram"></a></li>

                    <li><a href="##" class="social-icon-link bi-skype"></a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

<!-- JAVASCRIPT FILES -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/Headroom.js') }}"></script>
<script src="{{ asset('js/jQuery.headroom.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</body>
</html>
