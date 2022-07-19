@extends('home.layouts.app')

@section('title', 'Nosotros')

@section('content')
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
        <hr>
    </div>
@endsection
