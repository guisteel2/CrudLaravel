@extends('paineladm.template.index')

@section('conteudo')
<div class="contender">
    <h1 class="titulo" style="text-align: center;">Lista de Categorias de produtos</h1>   

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Açoes</th>
            </tr>
        </thead>

        <tbody>
        @foreach($categoria as $categoria)
            <tr>
                <td>{{$categoria->id}}</td>
                <td>{{$categoria->descricao}}</td>
                <td>
                    <a id="myEditecat" data-toggle="modal" data-target="#myEdite" data-id="{{$categoria->id}}"  data-nome="{{$categoria->descricao}}" href="#">
                        <button class="btn btndata btn-success" >Editar</button>
                    </a>

                    <a href="{{route('categoria.deleta',$categoria->id)}}">
                        <button class="btn btndata btn-danger">Remover</button></td>
                    </a>
                </td>
            </tr>
        @endforeach    
            
        </tbody>
        
    </table> 

    <div class="modal fade" id="myEdite" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="formCat" method="POST">
                                            {{ csrf_field() }}

                    <div class="modal-header">
                    <h4 class="modal-title" id="nomecat"></h4>
                    </div>

                    <div class="modal-body">          
                            <div class="form-group">
                                <strong>Nome da Categoria:</strong>
                                <input type="text" name="categoriamod" class="form-control" placeholder="Digite o nome">
                                @if($errors->has('categoriamod'))
                                    <span class="spangrid text-danger">{{ $errors->first('categoriamod') }}</span>
                                @endif
                            </div>
                    </div>

                    <div class="modal-footer">
                        <button id="eddcat" type="submit" class="btn btn-success">Salvar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class ='Aform' >
            <button onclick="chamaCategoria()" class="btn btn-success">Adicionar Categoria</button>
        </a>
</div>

@endsection



