@extends('pages.site.base')

@section('title', 'Fechamento dos itens')

@section('content')
    <main class="flex-fill">
        <div class="container">
            <h1>Confira os Itens</h1>
            <h3>Confira os itens e clique em <b>Continuar</b> para prosseguir para a <b>seleção do endereço de entrega</b>.
            </h3>
            <ul class="list-group mb-3">
                @foreach ($products as $product)
                    @if ($cart[$product->code])
                    <?php $total += $product->price * $cart[$product->code] ?>

                        <li class="list-group-item py-3">
                            <div class="row g-3">
                                <div class="col-4 col-md-3 col-lg-2">
                                    <a href="#">
                                        <img src="{{ url('storage/' . $product->images->first()->path) }}"
                                            class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="col-8 col-md-9 col-lg-7 col-xl-8 text-left align-self-center">
                                    <h4>
                                        <b><a href="#" class="text-decoration-none cor-principal-text">
                                                {{ $product->title }}</a></b>
                                    </h4>
                                    <h5>
                                        {{ $product->description }}
                                        <br>
                                        <b>
                                            {{ $cart[$product->code] }} unidade(s) <br>
                                            R$ {{ number_format($product->price * $cart[$product->code], 2, ',', '.') }}
                                        </b>
                                    </h5>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach


                <li class="list-group-item pt-3 pb-0">
                    <div class="text-end">
                        <h4 class="text-dark mb-3">
                            Valor Total: R$ {{ number_format($total,2,',','.') }}
                        </h4>
                        <a href="{{route('site.cart')}}" class="btn btn-outline-success btn-lg mb-3">
                            Voltar ao Carrinho
                        </a>
                        <a href="{{route('site.checkout')}}" class="btn text-white cor-principal btn-lg ms-2 mb-3">Continuar</a>
                    </div>
                </li>
            </ul>

        </div>
    </main>
@endsection
