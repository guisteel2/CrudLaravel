<header class='Header'>

<nav class='Menu navbar navbar-expand-lg'>
    <a class="navbar-brand" href="/">Vtsite</a>
    <button class="navbar-toggler navbar-light bg-light " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>

    </button>

    <div class="topaling collapse navbar-collapse" id="navbarSupportedContent">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Editar Cadastro
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{route('editar.cliente',Auth::user()->cliente_id)}}">Editar Perfil</a>

                    <a class="dropdown-item" id="alterarsenha" data-toggle="modal" data-target="#myModal" href="#">Alterar Senha</a>

            </li>
            
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produtos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                    <a class="dropdown-item" href="{{route('produtos.lista')}}">Seus Produtos</a>

                    <a class="dropdown-item" href="{{route('produtos.adicionar')}}">Adicionar Produto</a>

                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="btngetcate" data-toggle="modal" data-target="#myModal1" href="#">Adicionar categoria para os produtos</a>
                        <a class="dropdown-item" href="{{route('categoria.index')}}">Lista categoria para o produto</a>
                        
                    <div class="dropdown-divider"></div>
                        <a onclick="getCategoria()" id="btngetcate" class="dropdown-item" data-toggle="modal" data-target="#myModal2" href="#">Adicionar Tipo de Categoria</a>
                        <a class="dropdown-item" href="{{route('tipo.index')}}">Lista de Tipos Categoria</a>
                    </div>

            </li>

    
    </div>
</nav>
    
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="GET" action="{{route('att.cliente.senha')}}">
                                        {{ csrf_field() }}

                <div class="modal-header">
                <h4 class="modal-title">Editar senha</h4>
                </div>

                <div class="modal-body">          
                        <div class="form-group">
                            <strong>Senha Atual:</strong>
                            <input type="password" name="password" class="form-control" placeholder="Digite sua senha atual">
                            @if($errors->has('password'))
                                <span class="spangrid text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <strong>Nova Senha:</strong>
                            <input type="password" name="novsenha" class="form-control" placeholder="Digite a nova senha">
                            @if($errors->has('novsenha'))
                                <span class="spangrid text-danger">{{ $errors->first('novsenha') }}</span>
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

<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="{{route('categoria.adicionar')}}">
                                        {{ csrf_field() }}

                <div class="modal-header">
                <h4 class="modal-title">Categoria do produto</h4>
                </div>

                <div class="modal-body">          
                        <div class="form-group">
                            <strong>Nome da Categoria:</strong>
                            <input type="text" name="categoria" class="form-control" placeholder="Digite o nome">
                            @if($errors->has('categoria'))
                                <span class="spangrid text-danger">{{ $errors->first('categoria') }}</span>
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

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form id="formtipocat" method="POST" action="{{route('tipo.adicionar')}}">
                                        {{ csrf_field() }}

                <div class="modal-header">
                <h4 class="modal-title">Tipo de Categoria</h4>
                </div>
                

                <div class="modal-body">     

                    <div class="form-group">
                        <strong>Selecione a categoria:</strong>
                        <select class="form-control" id="selectform" name="categoria_id">
                        <option nome="categoria_id" value="" selected>Selecione a categoria</option>  
                        </select>
                            @if($errors->has('categoria_id'))
                                <script type="text/javascript">
                                        $('#tipo').click();
                                </script>
                            <span class="spangrid text-danger">{{ $errors->first('categoria_id') }}</span>
                            @endif          
                    </div>     

                    <div class="form-group">
                        <strong>Nome do Tipo da categoria:</strong>
                        <input type="text" name="tipo" class="form-control" placeholder="Digite o nome">
                        @if($errors->has('tipo'))
                            <span class="spangrid text-danger">{{ $errors->first('tipo') }}</span>
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



</header>



</header>


