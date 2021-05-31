@extends('layouts.base');
@section('products')
    @foreach ($productos as $producto)
    <div class="col-lg-3 mb-3 mt-5">
        <div class="d-block card mb-3 box-shadow targetas-products mx-auto fondos_targetas ">
            <img class="card-img-top"
                style="height: 225px; width: 100%; display: block;"
                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_179665e1b58%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_179665e1b58%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.71875%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                >
            <div class="card-body">
                <h4 class="featurette-heading"> <a href="productos/{{ $producto->code }}">
                    titulo: {{ $producto->name }}
                </a></h4>
            <span class="text-muted"> precio: {{ $producto->price }} </span>
            </div>
        </div>
    </div>
@endforeach

    <div class="col-lg-12  justify-content-center d-flex  mt-2 mb-4 ">
        @if ($admin == true)
            <p>
                <a class="btn btn-danger btn-mg" href="/nuevo_producto"> Crea un producto </a>
            </p>
        @endif

    </div>
    <div class="col-lg-12  justify-content-center d-flex ">
        {{ $productos->links() }}
    </div>
@endsection
