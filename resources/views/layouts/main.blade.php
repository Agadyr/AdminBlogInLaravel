<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edica :: Home</title>
    <base href="{{asset('/')}}">
    <base src="{{asset('/')}}">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="assets/vendors/aos/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/js/loader.js"></script>
</head>
<style>
    .drop1{
        padding: 0 !important;
        margin-top: 5px;
    }
    .drop1 a{
        padding: 5px 10px;
        text-decoration: none;
    }
    .drop1 a:hover{
        width: 100%;
        height: 100%;
        background-color: #dedede;
        cursor: pointer;
        color: #fff;
        transition: .1s;
    }
    .drop1 {
        display: none;
        overflow: hidden;
        animation: fadeInOut 0.2s ease-in-out;
    }
    @keyframes fadeInOut {
        0% {
            max-height: 0;
            opacity: 0;
        }
        100% {
            max-height: 200px; /* Установите значение, которое соответствует максимальной высоте контента */
            opacity: 1;
        }
    }
</style>
<body>
<div class="edica-loader"></div>
<header>
    <div class="container d-flex align-items-center" style="width: 100%;;">
        <a class="navbar-brand" href="index.html"><img src="assets/images/logo.svg" alt="Edica"></a>
        <a class="nav-link text-decoration-none " style="color:#000;font-weight: bold;text-align: center;"
           href="{{route('main.index')}}">Блог</a>
        @auth()
            <a class="nav-link text-decoration-none " style="color:#000;font-weight: bold;text-align: center;"
               href="{{route('personal.main.index')}}">Личный Кабинет</a>
        @endauth
        @guest()
            <a class="nav-link text-decoration-none " style="color:#000;font-weight: bold;text-align: center;"
               href="{{route('personal.main.index')}}">Войти</a>
        @endguest
        @guest()
            <div style="position: relative;width: 200px;">
                <button class="nav-link text-decoration-none " style="color:#000;font-weight: bold;text-align: left;padding: 0;border: none;background-color: transparent;outline: none"
                    onclick="ToggleMenu()">Категории</button>
                <div class="drop1" style="position: absolute;background-color: #fff;border: 1px solid #dedede;z-index: 999;padding: 10px;border-radius: 4px">
                    @foreach($category as $categories)
                        @if($categories)
                            <a href="{{route('category.post.index',$categories->id)}}" style="font-size: 14px;display: block"> {{$categories->title}}</a>
                        @endif
                    @endforeach
                </div>
            </div>

        @endguest
    </div>
</header>

@yield('content')
<section class="edica-footer-banner-section">
    <div class="container">
        <div class="footer-banner" data-aos="fade-up">
            <h1 class="banner-title">Download it now.</h1>
            <div class="banner-btns-wrapper">
                <button class="btn btn-success"><img src="assets/images/apple@1x.svg" alt="ios" class="mr-2"> App Store
                </button>
                <button class="btn btn-success"><img src="assets/images/android@1x.svg" alt="android" class="mr-2">
                    Google Play
                </button>
            </div>
            <p class="banner-text">Add some helper text here to explain the finer details of your <br> product or
                service.</p>
        </div>
    </div>
</section>
<footer class="edica-footer" data-aos="fade-up">
    <div class="container">
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <a href="index.html" class="footer-brand-wrapper">
                    <img src="assets/images/logo.svg" alt="edica logo">
                </a>
                <p class="contact-details">hello@edica.com</p>
                <p class="contact-details">+23 3000 000 00</p>
                <nav class="footer-social-links">
                    <a href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a href="#!"><i class="fab fa-twitter"></i></a>
                    <a href="#!"><i class="fab fa-behance"></i></a>
                    <a href="#!"><i class="fab fa-dribbble"></i></a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">Company</a>
                    <a href="#!" class="nav-link">Android App</a>
                    <a href="#!" class="nav-link">ios App</a>
                    <a href="#!" class="nav-link">Blog</a>
                    <a href="#!" class="nav-link">Partners</a>
                    <a href="#!" class="nav-link">Careers</a>
                </nav>
            </div>
            <div class="col-md-3">
                <nav class="footer-nav">
                    <a href="#!" class="nav-link">FAQ</a>
                    <a href="#!" class="nav-link">Reporting</a>
                    <a href="#!" class="nav-link">Block Storage</a>
                    <a href="#!" class="nav-link">Tools & Integrations</a>
                    <a href="#!" class="nav-link">API</a>
                    <a href="#!" class="nav-link">Pricing</a>
                </nav>
            </div>
            <div class="col-md-3">
                <div class="dropdown footer-country-dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="footerCountryDropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-gb flag-icon-squared"></span> United Kingdom <i
                            class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="footerCountryDropdown">
                        <button class="dropdown-item" href="#">
                            <span class="flag-icon flag-icon-us flag-icon-squared"></span> United States
                        </button>
                        <button class="dropdown-item" href="#">
                            <span class="flag-icon flag-icon-au flag-icon-squared"></span> Australia
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom-content">
            <nav class="nav footer-bottom-nav">
                <a href="#!">Privacy & Policy</a>
                <a href="#!">Terms</a>
                <a href="#!">Site Map</a>
            </nav>
            <p class="mb-0">© Edica. 2020 <a href="https://www.bootstrapdash.com" target="_blank"
                                             rel="noopener noreferrer" class="text-reset">bootstrapdash</a> . All rights
                reserved.</p>
        </div>
    </div>
</footer>
<script src="assets/vendors/popper.js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="assets/vendors/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
<script>
    AOS.init({
        duration: 1000
    });
    function ToggleMenu(){
        let drop1 = document.querySelector('.drop1')
        if (drop1.style.display === 'none' || drop1.style.display === '') {
            drop1.style.display = 'block';
        } else {
            drop1.style.display = 'none';
        }
    }


</script>
</body>

</html>
