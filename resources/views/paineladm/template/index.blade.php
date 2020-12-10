<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link href="{{ asset('css/geral.css') }}"  rel="stylesheet">



        <title>@yield('titulo')</title>
    </head>

    <body class="corpo">

        @include('paineladm.template.top')

        @yield('conteudo')

        @include('paineladm.template.footer')

        @if(Session::has('success'))
            <script>
                var msg = '{{Session::get('success')}}';
                alert(msg);
            </script> 
            @php Session::forget('success'); @endphp  
        @endif
        
        @if($errors->has('password') || $errors->has('novsenha'))
            <a class="dropdown-item" style="display: none;" id="alterarsenha" data-toggle="modal" data-target="#myModal" href="#">Alterar Senha</a>
            
            <!-- jquery -->
            <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <!-- bootstrap -->
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <!-- chamada da função -->
            <script type="text/javascript">
                $(window).load(function() {
                    $('#alterarsenha').click();
                });
            </script>
        @endif

    </body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
