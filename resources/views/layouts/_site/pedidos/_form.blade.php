<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

Id:
<div class="input-field">

   <input type="text" name="id" class="validate" value="{{isset($pedido['id']) ? $pedido['id'] : ''}}">
</div>
Cliente:
<div class="input-field">

   <select id="cliente" name="cliente" class="">
      <option value="null">Selecione o cliente</option>
      @if(isset($clientes)){
      @foreach($clientes as $cliente){
      <option value="{{$cliente->id}}">{{$cliente->nome}}</option>
      }
      @endforeach
      }
      @endif
   </select>
</div>
Produto:
<div class="input-field">
   <select id="produtos" name="produtos">
      <option value="null">Selecione o produto</option>
      @if(isset($produtos)){
      @foreach($produtos as $produto){
      <option value="{{$produto->id}}">{{$produto->titulo}}</option>
      }
      @endforeach
      }
      @endif
   </select>

   <button type="button" id="add-campo">Adicionar novo item</button>
</div>
Itens da Venda:
<div class="itens-venda input-field">
   <div id="lista-itens">
      <table id="tableitem" class="centered responsive-table highlight striped"></table>

   </div>
</div>

Total do pedido:
<div class="input-field">
   <input type="text" id="total" name="total" value="{{isset($pedido['total']) ? $pedido['total'] : ''}}">
</div>
Status da Venda:
<div class="input-field">
   <select id="status" name="status">
      <option value="null">Selecione o status da venda</option>

      <option value="aberto">Aberto</option>
      <option value="finalizado">Finalizado</option>
      <option value="cancelado">Cancelado</option>

   </select>

</div>