<div class="input-field">
<label>Código:</label>
   <input type="text" name="id" required="required" 
   value="{{isset($produto['id']) ? $produto['id'] : ''}}">
    
</div>
<div class="input-field">
<label>Titulo:</label>
   <input type="text" name="titulo" required="required" value="{{isset($produto['titulo']) ? $produto['titulo'] : ''}}">
    
</div>
<div class="input-field">
<label>Preço:</label>
   <input type="text" name="preco" required="required" value="{{isset($produto['preco']) ? $produto['preco'] : ''}}">    
</div>

<div class="input-field">
<label>Quantidade em estoque:</label>
   <input type="text" name="qtde" required="required" value="{{isset($produto['qtde']) ? $produto['qtde'] : ''}}">    
</div>
