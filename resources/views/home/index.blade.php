<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>C. Rosita | Inicio</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Moonrocks&family=Satisfy&display=swap" rel="stylesheet">
    @yield('style')
    <link rel="shortcut icon" href="{{ asset('./img/imagotipo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('./css/styles.css') }}">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                    <img src="{{ asset('img/imagotipo.png') }}" alt="logo" width="50px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-6" aria-current="page"
                                href="{{ route('welcome') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold fs-6" href="#">Tienda <span
                                    class="badge bg-warning">Proximamente</span></a>
                        </li>
                    </ul>
                    <div class="div ms-auto">
                        @auth
                            <p>{{ Auth::user()->name . ' ' . Auth::user()->lastname }}</p>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesion</a>
                            <a href="{{ route('registrar') }}" class="btn btn-info">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid p-0 m-0">
        <div class="row w-100 my-3 mx-0">
            <div class="col-12 col-md-10 p-5 bg-light mx-auto shadow-lg">
                <h3
                    class="text-center border-start border-end border-5 border-terciario text-terciario w-50 mx-auto p-2 rounded font-rubik">
                    Nosotros</h3>
                <div class="container mx-auto">
                    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non sunt
                        eligendi placeat repellat
                        quas voluptate ex ea, ipsam temporibus quibusdam blanditiis recusandae obcaecati. Porro fuga nam
                        vero odio eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non sunt
                        eligendi placeat repellat
                        quas voluptate ex ea, ipsam temporibus quibusdam blanditiis recusandae obcaecati. Porro fuga nam
                        vero odio eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non sunt
                        eligendi placeat repellat
                        quas voluptate ex ea, ipsam temporibus quibusdam blanditiis recusandae obcaecati. Porro fuga nam
                        vero odio eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non sunt
                        eligendi placeat repellat
                        quas voluptate ex ea, ipsam temporibus quibusdam blanditiis recusandae obcaecati. Porro fuga nam
                        vero odio eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non sunt
                        eligendi placeat repellat
                        quas voluptate ex ea, ipsam temporibus quibusdam blanditiis recusandae obcaecati. Porro fuga nam
                        vero odio eveniet.Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum non sunt
                        eligendi placeat repellat
                        quas voluptate ex ea, ipsam temporibus quibusdam blanditiis recusandae obcaecati. Porro fuga nam
                        vero odio eveniet.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto">
        <div class="row justify-content-around align-items-center">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="card mx-auto m-3 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-lock-fill d-block mx-auto mb-3 text-info" viewBox="0 0 16 16">
                        <path
                            d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                    </svg>
                    <h6 class="card-title text-center fw-bold fs-3">Seguridad</h6>
                    <div class="card-body">
                        <p class="text-center">
                            Encuentra una gran seguridad a la hora de realizar tus compras con nosotros tus datos
                            siempre serán protegidos y resguardados de forma adecuada.
                            Contamos con metodos de pago accesisbles y seguros
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 m-3">
                <div class="card mx-auto m-3 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-star-fill d-block mx-auto mb-3 text-info" viewBox="0 0 16 16">
                        <path
                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                    </svg>
                    <h6 class="card-title text-center fw-bold fs-3">Calidad</h6>
                    <div class="card-body">
                        <p class="text-center">
                            Nuestros productos son valorados por nuestros clientes pero además somos una empresa
                            reconocida por su gran crecimiento gracias a la satisfaccion de
                            nuestros clientes en la calidad de nuestros productos.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-xl-3 m-3 mb-5">
                <div class="card mx-auto m-3 p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-fast-forward-btn-fill mx-auto mb-3 text-info" viewBox="0 0 16 16">
                        <path
                            d="M0 4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2Zm4.271 1.055a.5.5 0 0 1 .52.038L8 7.386V5.5a.5.5 0 0 1 .79-.407l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 8 10.5V8.614l-3.21 2.293A.5.5 0 0 1 4 10.5v-5a.5.5 0 0 1 .271-.445Z" />
                    </svg>
                    <h6 class="card-title text-center fw-bold fs-3">Eficiencia</h6>
                    <div class="card-body">
                        <p class="text-center">
                            ¡No esperes mas!, cuando recibimos tu pedido trabajamos desde el primer hasta el último
                            instante para enviarte tu pedido lo mas pronto posible y puedas
                            estrenar ese outfit que tanto deseas
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5 pb-5 mx-auto">
        <div class="row align-items-center justify-content-around overflow-hidden">
            <div class="col-12 col-md-8 p-3">
                <h6 class="text-center fs-2 fw-bold p-3">Ubicación</h6>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3764.660611151881!2d-99.47962168470296!3d19.34052804862907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d20a14878a64eb%3A0x65bdb503fdce37bc!2sUniversidad%20Tecnol%C3%B3gica%20del%20Valle%20de%20Toluca!5e0!3m2!1ses-419!2smx!4v1657952310185!5m2!1ses-419!2smx"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <footer class="col-12">
        <div class="col-12" id="informacion">
            <ul class="text-white">
                <li>
                    <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                        </svg>
                        Correo
                    </h6>
                    <p class="d-inline ps-2 ps-md-4 mb-0">al221910321@gmail.com</p>
                </li>
                <li>
                    <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg>
                        Telefono
                    </h6>
                    <p class="d-inline ps-2 ps-md-4 mb-0">728-285-6329</p>
                </li>
                <li>
                    <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path
                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                        </svg>
                        WhatsApp
                    </h6>
                    <p class="d-inline ps-2 ps-md-4 mb-0">722-662-8263</p>
                </li>
            </ul>
        </div>
    </footer>
    @include('sweetalert::alert')
    <script src="{{ asset('./js/jquery.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
