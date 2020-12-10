@extends('paineladm.template.index')

@section('conteudo')
<div class="contender">

<div class="contender">

        <div class="div">
         
            <div class="card">
                <h1 class="titulo" style="text-align: center;">Editar Cadastro</h1> 
                    
                    
                        
                        <form method="POST" action="{{route('att.cliente')}}">
                            {{ csrf_field() }}
                            
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                                @if($errors->has('email'))
                                    <span class="spangrid text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div> 
                                    <label>Name:</label>
                                        <input type="text" name="nome" class="form-control" placeholder="Name" value="{{$cliente->nome}}">
                                        @if($errors->has('nome'))
                                            <span class="spangrid text-danger">{{ $errors->first('nome') }}</span>
                                        @endif
                                </div>
                            </div>

                            <div>
                                <label>Sobre Nome:</label>
                                <input type="text" name="sobrenome" class="form-control" placeholder="Sobre Nome" value="{{$cliente->sobrenome}}">
                                @if($errors->has('sobrenome'))
                                        <span class="spangrid text-danger">{{ $errors->first('sobrenome') }}</span>
                                    @endif
                            </div>

                            <div form-group>
                                    <label>Cpf:</label>
                                    <input type="text" name="cpf" class="form-control" placeholder="cpf" value="{{$cliente->cpf}}">
                                    @if($errors->has('cpf'))
                                            <span class="spangrid text-danger">{{ $errors->first('cpf') }}</span>
                                        @endif
                                </div>
                    
                            <div class="form-group">
                                <label>cep:</label>
                                <input type="text" name="cep" class="form-control" placeholder="cep" value="{{$cliente->cep}}">
                                @if($errors->has('cep'))
                                            <span class="spangrid text-danger">{{ $errors->first('cep') }}</span>
                                        @endif
                            </div>

                            <div class="form-group">
                                <label>Endereco:</label>
                                <input type="text" name="endereco" class="form-control" placeholder="endereco" value="{{$cliente->endereco}}">
                                @if($errors->has('endereco'))
                                            <span class="spangrid text-danger">{{ $errors->first('endereco') }}</span>
                                        @endif
                            </div>

                            <div class="form-group">
                                <label>Bairro:</label>
                                <input type="text" name="bairro" class="form-control" placeholder="bairro" value="{{$cliente->bairro}}">
                                @if($errors->has('bairro'))
                                            <span class="spangrid text-danger">{{ $errors->first('bairro') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label>EndNun:</label>
                                <input type="text" name="endNun" class="form-control" placeholder="Numero" value="{{$cliente->endNun}}">
                                @if($errors->has('endNun'))
                                            <span class="spangrid text-danger">{{ $errors->first('endNun') }}</span>
                                @endif
                            </div>


                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Atualizar</button>
                                <button class="btn btn-danger btn-submit">Cancelar</button>
                            </div>
                            
                        </form>
                    </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection