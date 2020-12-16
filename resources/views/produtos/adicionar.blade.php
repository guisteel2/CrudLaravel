@extends('paineladm.template.index')

@section('conteudo')
<div class="contender">
<div class="div">
    <div class="card">
        <h1 class="titulo" style="text-align: center;">Cadastro de Produto</h1> 
        <div class="card-body">
            <form method="POST" action="{{route('produtos.adicionar') }}"  method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                @include('produtos.formproduto')
            </form>
        </div>
    </div>
</div>

</div>
    <script type="text/javascript">
    function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-ip-1-preview");
        preview.src = src;
        preview.style.display = "block";
    }
    }
</script>
@endsection
