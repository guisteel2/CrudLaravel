@extends('paineladm.template.index')

@section('conteudo')
<div class="contender">
    <h1 class="titulo" style="text-align: center;">Lista de Categorias de produtos</h1>   

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id:</th>
                <th>Name:</th>
            </tr>
        </thead>

        <tbody>
        @foreach($categoria as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->descricao}}</td>
            </tr>
        @endforeach    
            
        </tbody>
    </table> 
</div>
@endsection
