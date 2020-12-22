<div class="form-group">
    <strong>Foto Do Produto:</strong>
    <div class="center">
        <div class="form-input">
            <label for="file-ip-1">Procurar img</label>
            @if ($errors->has('image'))
                <span class="spangrid text-danger">{{ $errors->first('image') }}</span>
            @endif
            <input type="file" id="file-ip-1" accept="image/*" name="image" onchange="showPreview(event);">
            <div class="preview">
                @if(isset($produto['foto_id']))
                    <img id="file-ip-1-preview" style="display:block" src="{{isset($produto['foto_id'])?$produto['foto_id'] :''}}" >
                @else
                    <img id="file-ip-1-preview" src="" >
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label>Name:</label>
    <input type="text" name="descricao" class="form-control" placeholder="digite o nome do produto" value="{{ isset($produto->descricao) ? $produto->descricao :'' }}">
    @if ($errors->has('descricao'))
        <span class="spangrid text-danger">{{ $errors->first('descricao') }}</span>
    @endif
</div>

<div class="form-group">
    <label>Valor:</label>
    <input type="text" name="valor" class="form-control" placeholder="valor do produto" value="{{isset($produto->valor)?$produto->valor:''}}">
    @if ($errors->has('valor'))
        <span class="spangrid text-danger">{{ $errors->first('valor') }}</span>
    @endif
</div>

<div class="form-group">
    <label>Categoria:</label>
    <select class="form-control" name="categoria_id" onchange="getCategorias(this.value)">
        <option value="">Selecione uma categoria</option>
        @foreach($categorias as $key => $categoria)
            @if(isset($produto['categoria_id']) && $produto['categoria_id'] == $categoria->id)
                <option value="{{$categoria->id}}" selected="true">{{$categoria->descricao}}</option>
            @else
                <option value="{{$categoria->id}}"> {{$categoria->descricao}}</option>
            @endif
        @endforeach
    </select>
    @if ($errors->has('categoria_id'))
        <span class="spangrid text-danger">{{ $errors->first('categoria_id') }}</span>
    @endif
</div>
                
<div class="form-group">
    <label>Tipo:</label>
    
    <select id="tipoform_id" class="form-control" name="tipo_id">
        <option value="" >Selecione um tipo</option>
    </select>

    @if ($errors->has('tipo'))
        <span class="spangrid  text-danger">{{ $errors->first('tipo') }}</span>
    @endif
</div>
               
<div class="form-group text-center">
    <button class="btn btn-success btn-submit">Salva</button>
    <button class="btn btn-danger btn-submit">Cancelar</button>
</div>
