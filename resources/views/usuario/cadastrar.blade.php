@extends('template.index')

@section('conteudo')
<div class="contender">

        <div class="div">
         
            <div class="card">
                <h1 class="titulo" style="text-align: center;">Cadastro de Cliente</h1> 
                    <div class="card-body">
                        
                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                        @endif
                   
                        <form method="POST" action="{{ route('cadastro.cliente') }}">
                            {{ csrf_field() }}
                                        
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="spangrid text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                    <label>Name:</label>
                                        <input type="text" name="nome" class="form-control" placeholder="Name">
                                        @if ($errors->has('nome'))
                                            <span class="spangrid text-danger">{{ $errors->first('nome') }}</span>
                                        @endif
                            </div>

                            <div class="form-group">
                                <label>Sobrenome:</label>
                                <input type="text" name="sobrenome" class="form-control" placeholder="Sobre Nome">
                                @if ($errors->has('sobrenome'))
                                    <span class="spangrid text-danger">{{ $errors->first('sobrenome') }}</span>
                                @endif
                            </div>

                            <div>
                                <label>Cpf:</label>
                                <input type="text" name="cpf" class="form-control" placeholder="cpf"/>
                                @if ($errors->has('cpf'))
                                    <span class="spangrid text-danger">{{ $errors->first('cpf') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label>CEP:</label>
                                <input type="text" name="cep" class="form-control" placeholder="cep">
                                @if ($errors->has('cep'))
                                    <span class="spangrid  text-danger">{{ $errors->first('cep') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Endereco:</label>
                                <input type="text" name="endereco" class="form-control" placeholder="endereco">
                                @if ($errors->has('endereco'))
                                    <span class="spangrid  text-danger">{{ $errors->first('endereco') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Bairro:</label>
                                <input type="text" name="bairro" class="form-control" placeholder="bairro">
                                @if ($errors->has('bairro'))
                                    <span class="spangrid  text-danger">{{ $errors->first('bairro') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>EndNun:</label>
                                <input type="text" name="endNun" class="form-control" placeholder="Numero">
                                @if ($errors->has('endNun'))
                                    <span class="spangrid  text-danger">{{ $errors->first('endNun') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Senha:</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="spangrid  text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                     
                            <!-- para validar msm senha do cliente digitada a cima
                            <div class="form-group">
                                <label>Confirme a senha:</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div> -->
                    
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">Salva</button>
                                <button class="btn btn-danger btn-submit">Cancelar</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection