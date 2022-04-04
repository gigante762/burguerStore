@extends('site.base')

@section('title','Página Inicial')


@section('content')
<div class="container">
    <div id="carouselMain" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselMain" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="{{url('storage/slides/slide01.jpg')}}" class="d-none d-md-block w-100" alt="">
                <img src="{{url('slides/slide01small.jpg')}}" class="d-block d-md-none  w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{url('storage/slides/slide01.jpg')}}" class="d-none d-md-block w-100" alt="">
                <img src="{{url('slides/slide01small.jpg')}}" class="d-block d-md-none  w-100" alt="">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="{{url('storage/slides/slide01.jpg')}}" class="d-none d-md-block w-100" alt="">
                <img src="{{url('slides/slide01small.jpg')}}" class="d-block d-md-none  w-100" alt="">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>
    <hr class="mt-3">
</div>

<main class="flex-fill">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <form class="justify-content-center justify-content-md-start mb-3 mb-md-0" method="post" action="">
                    @csrf
                    @method('POST')
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Digite aqui o que procura" name='filter' value="{{ $filters['filter'] ?? '' }}">
                        <button  type='sumbit' class="btn text-white cor-principal">Buscar</button>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-7">
                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">

                    {{-- @include('pages.site.includes.orderby') --}}

                    {{-- @include('pages.site.includes.pagination') --}}
                    
                </div>
            </div>
        </div>

        <hr mt-3>

        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card text-center bg-light">
                    <a href="#" class="position-absolute end-0 p-2 text-danger ">
                        <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                    </a>
                    <a href="{{route('site.products.show',$product->id)}}">
                        <img src="{{$product->mainImageUrl()}}" class="card-img-top">
                    </a>
                    <div class="card-header">
                        R$ {{ number_format($product->price,2,',','.') }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text truncar-3l">
                            {{ $product->description }}
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="" class="btn mt-2 d-block text-white cor-principal">
                            Adicionar ao Carrinho
                        </a>
                        {{-- <small class="text-success">320,5kg em estoque</small> --}}
                    </div>
                </div>
            </div>
            @endforeach
            

            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card text-center bg-light">
                    <a href="#" class="position-absolute end-0 p-2 text-danger">
                        <i class="bi-suit-heart" style="font-size: 24px; line-height: 24px;"></i>
                    </a>
                    <img src="{{url('storage/products/0kRmwRCG15dkBQxwt2YRUtSC46xtBDbtlKjlBSS1.jpg')}}" class="card-img-top">
                    <div class="card-header">
                        R$ 4,50
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Mamão fora de estoque</h5>
                        <p class="card-text truncar-3l">
                            Mamão da melhor qualidade possível, direto do produtor rural para a sua mesa.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-light disabled mt-2 d-block">
                            <small>Reabastecendo Estoque</small>
                        </a>
                        <small class="text-danger">
                            <b>Produto Esgotado</b>
                        </small>
                    </div>
                </div>
            </div>
            
            
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="card text-center bg-light">
                    <a href="#" class="position-absolute end-0 p-2 text-danger">
                        <i class="bi-suit-heart-fill" style="font-size: 24px; line-height: 24px;"></i>
                    </a>
                    <img src="{{url('storage/products//TvFQbCJSYzdV5lnLXhTop5rl2m2RNT0bxTN1pr3q.jpg')}}" class="card-img-top">
                    <div class="card-header">
                        R$ 4,50
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Abobora favorita</h5>
                        <p class="card-text truncar-3l">
                            Aboborada melhor qualidade possível, direto do produtor rural para a sua mesa.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="carrinho.html" class="btn btn-danger mt-2 d-block">
                            Adicionar ao Carrinho
                        </a>
                        <small class="text-success">320,5kg em estoque</small>
                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-3">

        <div class="row pb-3">
            <div class="col-12">
                <div class="d-flex flex-row-reverse justify-content-center justify-content-md-start">
                    
                    {{-- @include('pages.site.includes.orderby') --}}

                    {{-- @include('pages.site.includes.pagination') --}}
                </div>
            </div>
        </div>
    </div>
</main>

<script>
/* let select = document.querySelector('select')
select.addEventListener('change',()=>{
    select.parentElement.submit()
}) */


</script>
@endsection