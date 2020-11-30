@extends('template.index')

@section('conteudo')

<div class="contender">
<div class="login">

    <div>
        <form method="POST" action="{{url('usuarios/log') }}">   
            {{ csrf_field() }}
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
    
            <div class="form-group text-center">
                <button class="btn btn-success btn-submit">Entrar</button>
            </div>
        </form>
    </div>

    <div class="cadastro">
        <h1><a href="/cadastrar/usuario" >Ainda não é inscrito? <strong> Cadastre-se! </strong> </a></h1>
    </div>

</div>
</div>
    
@endsection