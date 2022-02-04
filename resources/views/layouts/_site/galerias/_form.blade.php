@if(isset($galeria->imagem))
<div class="input-field">
    <label>Ordem:</label>
    <input type="text" name="ordem" 
    class="validate" value="{{isset($galeria->ordem) ? $galeria->ordem : ''}}">
    
</div>
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <input type="file" name="imagem">
            arquivo
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate" >
        </div>

    </div>
    <div class="col m6 s12">
        <img src="{{asset($galeria->imagem)}}" width="120">

    </div>

</div>  

@else
    <div class="row">
    <div class="file-field input-field col m12 s12">
        <div class="btn">
            <input type="file" multiple=" "name="imagens[]">
            arquivo
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validate" >
        </div>

    </div>
    
@endif