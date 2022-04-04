@extends('pages.site.base')

@section('title', 'Carrinho de Compras')

@section('content')
    <main class="flex-fill">
        <div class="container">
            <h1>Carrinho de Compras</h1>
            @if ($cart)
            <ul class="list-group mb-3">
                @foreach ($products as $product)
                @if ($cart[$product->code])
               <?php $total += $product->price * $cart[$product->code] ?>
                <li class="list-group-item py-3">
                    <div class="row g-3">
                        <div class="col-4 col-md-3 col-lg-2">
                            <a href="#">
                                <img src="{{url('storage/'.$product->images->first()->path)}}" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                            <h4>
                                <b><a href="{{route('site.product',$product->code)}}" class="text-decoration-none cor-principal-text">
                                        {{$product->title}}</a></b>
                            </h4>
                            <h5>
                                {{$product->description}}
                            </h5>
                        </div>
                        <div
                            class="col-6 offset-6 col-sm-6 offset-sm-6 col-md-4 offset-md-8 col-lg-3 offset-lg-0 col-xl-2 align-self-center mt-3">
                            <div class="input-group">
                                <a  href="{{route('cart.remove',[$product->code,1])}}" class="btn btn-outline-dark btn-sm">
                                    <i class="bi-caret-down" style="font-size: 16px; line-height: 32px;"></i>
                                </a>
                                <input type="text" class="form-control text-center border-dark" value="{{$cart[$product->code]}}">
                                <a href="{{route('cart.add',[$product->code,1])}}" class="btn btn-outline-dark btn-sm">
                                    <i class="bi-caret-up" style="font-size: 16px; line-height: 32px;"></i>
                                </a>
                                <a  href="{{route('cart.deleteitem',$product->code)}}" class="btn btn-outline-danger border-dark btn-sm" type="button">
                                    <i class="bi-trash" style="font-size: 16px; line-height: 32px;"></i>
                                </a>
                            </div>
                            <div class="text-end mt-2">
                                <small class="text-secondary">Valor  R$ {{ number_format($product->price,2,',','.') }}</small><br>
                                <span class="text-dark">Valor Item:  R$ {{ number_format($product->price * $cart[$product->code],2,',','.') }}</span>
                            </div>
                        </div>
                    </div>
                </li>
                @endif
                @endforeach
                
                <li class="list-group-item py-3">
                    <div class="text-end">
                        <h4 class="text-dark mb-3">
                            
                            Valor Total: R$ {{ number_format($total,2,',','.') }}
                        </h4>
                        <a href="{{route('site.index')}}" class="btn btn-outline-success btn-lg">
                            Continuar Comprando
                        </a>
                        <a href="{{route('site.fechamento-itens')}}" class="btn btn-lg ms-2 mt-xs-3  text-white cor-principal">Fechar Compra</a>
                    </div>
                </li>
            </ul>
            @else
            <div class="text-center">
                <h3 class="text-center mt-5">Não produtos no carrinho.</h3>
                <a class='btn text-white cor-principal' href="{{route('site.index')}}">Veja o nosso catálogo</a>
            </div>
            @endif
           
        </div>
    </main>
@endsection
