<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pagamento</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="/css/estilo.css">
    <link rel="icon" href="https://png.pngtree.com/element_our/png_detail/20181227/movie-icon-which-is-designed-for-all-application-purpose-new-png_287896.jpg">
    <script type="text/javascript"
    src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    function carregar() {
        PagSeguroDirectPayment.setSessionId('{{ $sessionID }}')
    }

    $(function() {
        carregar();

        $(".ncredito").on('blur', function() {
            PagSeguroDirectPayment.onSenderHashReady(function(response) {
                if (response.status == 'error') {
                    console.log(response.message)
                    return false
                }

                var hash = response.senderHash
                $(".hashseller").val(hash)
            })
        })

        let ncartao = $(this).val()
        if (ncartao.length > 6) {
            let prefixcartao = ncartao.substr(0, 6)
            PagSeguroDirectPayment.getBrand({
                cardBin: prefixcartao,
                success: function(response) {
                    $(".bandeira").val(response.brand.name)
                },
                error: function(response) {
                    alert("Número do Cartão Inválido")
                }
            })
        }

        $(".nparcela").on('blur', function(){
            var bandeira = 'visa';
            var totalParcelas = $(this).val();

            PagSeguroDirectPayment.getInstallments({
                amount: $(".totalfinal").val(),
                maxIntallmentNoInterest: 2,
                brand: bandeira,
                success: function(response) {
                    console.log(response)
                    let status = response.error
                    if (status) {
                        alert("Não foi encontrado opção de parcelamento")
                        return;
                    }
                    let indice = totalParcelas - 1;
                    let totalpagar = response.installments[bandeira][indice].totalAmount
                    let valorTotalParcela = response.installments[bandeira][indice].installmentAmount

                    $(".totalparcela").val(valorTotalParcela)
                    $(".totalpagar").val(totalpagar)
                }
            })
        })

        $(".pagar").on("click" , function(){
            var numerocartao = $(".ncredito").val()
            var iniciocartao = numerocartao.substr(0,6)
            var ncvv = $(".ncvv").val()
            var anoexp= $(".anoexp").val()
            var mesexp = $(".mesexp").val()
            var hashseller = $(".hashseller").val()
            var bandeira = $(".bandeira").val()

            PagSeguroDirectPayment.createCardToken({
                cardNumber : numerocartao,
                brand : bandeira,
                cvv : ncvv,
                expirationMonth :mesexp,
                expirationYear : anoexp,
                success : function(response){
                    $.post('{{ route("finalizarCarrinho" )}}',{
                        hashseller: hashseller,
                        cardtoken : response.card.token,
                        nparcelas : $(".nparcela").val(),
                        totalpagar: $(".totalpagar").val(),
                        totalparcela: $(".totalparcela").val(),
                    }, function(result){
                        alert(result)
                    }
                    );
                },
                error: function(err){
                    alert('Nao foi possivel buscar o cartão.')
                }
            })

        })
    })
</script>
</head>

<body>

    <header class="container-fluid p-3 bg-black text-danger">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route('home') }}" class=" col-sm nav-link px-2 text-danger ">Home</a></li>
                    <li><a href="{{ route('home') }}" class="col-sm nav-link px-2 text-danger ">Streaming</a></li>
                    <li><a href="{{ route('home')}}" class="col-sm nav-link px-2 text-danger ">Minha conta</a></li>
                    <li><a href="{{ route('genero') }}" class="col-sm nav-link px-2 text-danger">Gêneros</a></li>

                </ul>

                <div class="busca">
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control form-control-dark" placeholder="Buscar..."
                            aria-label="Search">
                    </form>
                </div>

                <div class="login">
                    @auth
                        <a href="{{ route('logout') }}" class="col-sm nav-link px-2 text-danger ">Logout</a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="col-sm nav-link px-2 text-danger ">Login</a>
                    @endguest
                </div>

                <div class="carrinho">
                    <a href="{{ route('verCarrinho') }}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
                </div>

            </div>
        </div>
        <div class="membro">
            <a href="{{ route('home') }}" class=" col-sm nav-link px-2 text-danger ">SEJA MEMBRO</a>
        </div>
    </header>

    <div class="container">
        <div class="row">
            @if($message = Session::get("err"))
            <div class="col-12">
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            </div>
            @endif
            @if($message = Session::get("ok"))
            <div class="col-12">
                <div class="alert alert-success">
                    {{$message}}
                </div>
            </div>
            @endif
            <form action="">
                @if (isset($carrinho) && count($carrinho) > 0)
                    <table class="table text-danger">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($carrinho as $id => $produto)
                                <tr>
                                    <td>{{ $produto->name }}</td>
                                    <td>R$ {{ $produto->valor }}</td>
                                </tr>
                                @php
                                    $total += $produto->valor;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <input type="text" name="hashseller" class="hashseller">
                <input type="text" name="bandeira" class="bandeira">

                <div class="row">
                    <div class="col-4">
                        <label for="ncredito">Cartão de Crédito:</label>
                        <input type="text" name="ncredito" class="ncredito form-control" />
                    </div>
                    <div class="col-4">
                        <label for="cvv">CVV:</label>
                        <input type="text" name="ncvv" class="ncvv form-control" />
                    </div>
                    <div class="col-4">
                        <label for="mesexp">Mês de Expiração:</label>
                        <input type="text" name="mesexp" class="mesexp form-control" />
                    </div>
                    <div class="col-4">
                        <label for="anoexp">Ano de Expiração:</label>
                        <input type="text" name="anoexp" class="anoexp form-control" />
                    </div>

                    <div class="col-4">
                        <label for="nomecartao">Nome no Cartão de Crédito:</label>
                        <input type="text" name="nomecartao" class="nomecartao form-control" />
                    </div>
                    <div class="col-4">
                        <label for="nparcela">Parcelas:</label>
                        <input type="text" name="nparcela" class="nparcela form-control" />
                    </div>

                    <div class="col-4">
                        <label for="totalfinal">Valor Total:</label>
                        <input type="text" name="totalfinal" value="{{ $total }}" class="totalfinal form-control"
                            readonly />
                    </div>

                    <div class="col-4">
                        <label for="totalparcela">Valor da Parcela:</label>
                        <input type="text" name="totalparcela" class="totalparcela form-control" />
                    </div>

                    <div class="col-4">
                        <label for="totalpagar">Total a Pagar:</label>
                        <input type="text" name="totalpagar" class="totalpagar form-control" />
                    </div>
                    @csrf
                </div>
                <input type="button" value="Confirmar Pagamento" class="btn btn-success btn-lg pagar" />


            </form>
        </div>
    </div>

    @include('base.footer')
</body>

</html>
