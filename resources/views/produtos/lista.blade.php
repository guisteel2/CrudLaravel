@extends('paineladm.template.index')

@section('conteudo')
<div class="contender">
    <h1 class="titulo" style="text-align: center;">Lista de produtos</h1>   
    <div class="formlist">
        <table id="example" class="display" cellspacing="0" width="100%">
            <thead style="text-align:center">
                <tr>
                    <th>Id:</th>
                    <th>foto_id:</th>
                    <th>Descricao:</th>
                    <th>valor:</th>
                    <th>categoria_id:</th>
                    <th>tipo_id:</th>
                    <th>Açoes:</th>
            </tr>
            </thead>

            <tbody style="text-align:center">
            @foreach($prod as $produtos)   
                <tr>
                    <td>{{$produtos->id}}</td>
                    <td>
                        <img src="{{$produtos->foto_id}}" class="img-thumbnail" alt="Cinque Terre" width="100" height="100"> 
                    </td>
                    <td>{{$produtos->descricao}}</td>
                    <td>{{$produtos->valor}}</td>
                    <td>{{$produtos->categoria_id}}</td>
                    <td>{{$produtos->tipo_id}}</td>
                    <td>
                        <a href="{{route('produtos.editar',$produtos->id)}}">
                            <button class="btn btndata btn-success" >Editar</button>
                        </a>
                        <a href="{{route('produtos.delete',$produtos->id)}}">
                            <button class="btn btndata btn-danger"  >Remover</button></td>
                        </a>
                    </tr>
            @endforeach    
                
            </tbody>
        </table> 
    </div>
    <a href="{{route('produtos.adicionar')}}">
        <button class="btn btn-success">Adicionar produto</button>
    </a>

</div>
@if(Session::has('success'))
    <script>
        var msg = '{{Session::get('success')}}';
        alert(msg);
    </script> 
    @php Session::forget('success'); @endphp  
@endif
@endsection
