@extends('paineladm.template.index')

@section('conteudo')
<div class="contender">
<div class="div">
    <div class="card">
        <h1 class="titulo" style="text-align: center;">Editar de Produto</h1> 
        <div class="card-body">
            <form method="POST" action="{{ route('cadastro.produto') }}">
                {{ csrf_field() }}
                @include('produtos.formproduto');
            </form>
        </div>
    </div>
</div>
</div>
@endsection