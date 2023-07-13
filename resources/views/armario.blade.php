@extends('template')

<body>
    <div class="container-fluid !direction !spacing  ">
        <h3 class="fs-3 fs-lg-5 lh-sm mt-5 centrado">Armario</h3>
        <div id="columns" class="columns_4">
            @foreach ($clothes as $ropa)
                <figure>
                    <img
                        src="{{URL::asset('assets/img/gallery/' . $ropa->image)}}">
                    <figcaption>{{ $ropa->name }}</figcaption>
                    <figcaption>{{ $ropa->brand }}</figcaption>
                    <a class="button" href="#">Recomendación</a>
                </figure>
            @endforeach
        </div>
    </div>
</body>
