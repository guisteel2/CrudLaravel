<div class="form-group">
    <strong>Foto Do Produto:</strong>
    <div class="center">
        <div class="form-input">
            <label for="file-ip-1">Procurar img</label>
            <input type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event);">
            <div class="preview">
            <img id="file-ip-1-preview">
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
    <input type="text" name="valor" class="form-control" placeholder="valor do produto" value=" {{ isset($produto->valor)  ?$produto->valor:''}}">
    @if ($errors->has('valor'))
        <span class="spangrid text-danger">{{ $errors->first('valor') }}</span>
    @endif
</div>

<div class="form-group">
    <label>Categoria:</label>
    <select class="form-control" name="categoria_id">
        @foreach($categorias as $categorias)
            <option value="{{$categorias->id}}" selected="{{isset($produto->categoria_id)==$categorias->id?true:'false'}}">{{$categorias->descricao}}</option>
        @endforeach
    </select>
    @if ($errors->has('categoria_id'))
        <span class="spangrid text-danger">{{ $errors->first('categoria_id') }}</span>
    @endif
</div>
                
<div class="form-group">
    <label>Tipo:</label>
    <select class="form-control" name="tipo_id">
        @foreach($tipos as $tipos)
            <option value="{{$tipos->id}}" selected="{{isset($produto->tipo_id)==$tipos->id?true:'false'}}">{{$tipos->descricao}}</option>
        @endforeach
    </select>
    @if ($errors->has('tipo'))
        <span class="spangrid  text-danger">{{ $errors->first('tipo') }}</span>
    @endif
</div>
               
<div class="form-group text-center">
    <button class="btn btn-success btn-submit">Salva</button>
    <button class="btn btn-danger btn-submit">Cancelar</button>
</div>


                
