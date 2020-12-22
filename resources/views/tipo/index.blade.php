@extends('paineladm.template.index')

@section('conteudo')
@if($errors->has('categorias_id') || $errors->has('tipo_categoria_nome'))
    <script type="text/javascript">
            alert('erro ao editar tipo de categoria por favor tente novamente');
    </script>
@endif
<div class="contender">
    <h1 class="titulo" style="text-align: center;">Lista de Tipo de categoria</h1>   

    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id:</th>
                <th>Name:</th>
                <th>Categoria:</th>
                <th>Açoes</th>
            </tr>
        </thead>

        <tbody>
        @foreach($tipos as $tipos)
            <?php $categoria = $tipos->getcategorias()->get(); ?>
            <tr>
                <td>{{$tipos->id}}</td>
                <td>{{$tipos->descricao}}</td>
                <td>{{$categoria[0]->descricao}}</td>
                <td>
                    <a id="btngettitpo" class="dropdown-item" data-toggle="modal" data-nome="{{$categoria[0]->descricao}}" data-catid="{{$categoria[0]->id}}" data-tipoid="{{$tipos->id}}"   data-target="#editartipo" href="#">
                        <button class="btn btndata btn-success" >Editar</button>
                    </a>

                    <a href="{{route('tipo.deleta',$tipos->id)}}">
                        <button class="btn btndata btn-danger">Remover</button></td>
                    </a>
                </td>
            </tr>
        @endforeach    
            
        </tbody>
    </table> 

    <a class ='Aform' >
        <button onclick="addctipos()" class="btn btn-success">Adicionar Tipo</button>
    </a>
</div>


<div class="modal fade" id="editartipo" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="formdotipo" method="POST">
                                        {{ csrf_field() }}

                <div class="modal-header">
                <h4 id="tituloeditecategoria" class="modal-title"></h4>
                </div>
                
                <div class="modal-body">     

                    <div class="form-group">
                        <strong>Selecione a categoria:</strong>
                        <select class="form-control" id="selectformtipo" name="categorias_id">
                        </select>
                            @if($errors->has('categorias_id'))
                                <span class="spangrid text-danger">{{ $errors->first('categorias_id') }}</span>
                            @endif          
                    </div>     

                    <div class="form-group">
                        <strong>Nome do Tipo da categoria:</strong>
                        <input type="text" name="tipo_categoria_nome" class="form-control" placeholder="Digite o nome">
                        @if($errors->has('tipo_categoria_nome'))
                            <span class="spangrid text-danger">{{ $errors->first('tipo_categoria_nome') }}</span>
                        @endif
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
