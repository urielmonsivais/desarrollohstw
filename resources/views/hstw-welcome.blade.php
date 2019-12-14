@extends('hstw')
@section('content')
<div class="over-cop">
    <h1 class="">HSTW</h1>
</div>
<div id="carouselExampleCaptions" class="carousel slide hwstw-ca" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img height="800" src="{{ asset('img/slider/1.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tarjetas de Crédito HSTW</h5>
                <p>¡Tu tarjeta te lleva a Shawn Mendes! Solicítala en línea, recógela en sucursal y participa</p>
            </div>
        </div>
        <div class="carousel-item">
            <img height="800" src="{{ asset('img/slider/2.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Disfruta 6 meses sin intereses en todas tus compras</h5>
                <p>Inscríbete antes, durante o después de tu viaje <br>Del 11 de noviembre de 2019 al 19 de enero de
                    2020</p>
            </div>
        </div>
        <div class="carousel-item">
            <img height="800" src="{{ asset('img/slider/3.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h2>SEGUROS HSTW</h2>
                <p>Tu protección es nuestra prioridad <br>
                    ¿Qué tipo de seguro estás buscando?</p>
            </div>
        </div>
        <div class="carousel-item">
            <img height="800" src="{{ asset('img/slider/4.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Participa por un boleto doble para el concierto de Shawn Mendes</h5>
                <p>
                    Baila al ritmo de tus canciones favoritas
                    <br>
                    Participa del 19 de noviembre al 10 de diciembre de 2019
                </p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section class="section-cont">
    <br>
    <div class="container ">
        <div class="row">
            <div class="col-12">

                <div class="card-group">
                    <div class="card">
                        <img src="{{ asset('img/post/1.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Liverpool</h5>
                            <p class="card-text">Hasta 25% en monedero y hasta 20 meses sin intereses.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('img/post/2.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Lego</h5>
                            <p class="card-text">3 meses sin intereses en Tiendas Certificadas LEGO.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <img src="{{ asset('img/post/3.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Moneypool</h5>
                            <p class="card-text">Usa Moneypool para tus posadas, y recibe 5% de reembolso.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<br>
@endsection
