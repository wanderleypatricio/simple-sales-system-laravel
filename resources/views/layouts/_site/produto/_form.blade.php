<div class="input-field">
<label>Código:</label>
   <input type="text" name="id" class="validate" 
   value="{{isset($produto['id']) ? $produto['id'] : ''}}">
    
</div>
<div class="input-field">
<label>Titulo:</label>
   <input type="text" name="titulo" class="validate "value="{{isset($produto['titulo']) ? $produto['titulo'] : ''}}">
    
</div>
<div class="input-field">
<label>Preço:</label>
   <input type="text" name="preco" class="validate "value="{{isset($produto['preco']) ? $produto['preco'] : ''}}">    
</div>

<div class="input-field">
<label>Quantidade em estoque:</label>
   <input type="text" name="qtde" class="validate "value="{{isset($produto['qtde']) ? $produto['qtde'] : ''}}">    
</div>
