var listaItens = new Array();
var valorTotal = 0.0;

function process(quant, op, linha) {
    var value = parseInt(document.getElementById("quant" + linha).value);
    value += quant;


    if (value < 1) {
        document.getElementById("quant" + linha).value = 1;
    } else {
        document.getElementById("quant" + linha).value = value;
    }

    var preco = parseFloat($("#preco" + linha).val());
    if (op === 'add') {
        $("#preco-total-item" + linha).attr('value', preco * value);

    } else {
        var precoTotalItem = parseFloat($("#preco-total-item" + linha).val());
        if (preco === precoTotalItem) {
            $("#preco-total-item" + linha).attr('value', preco);
        } else {
            $("#preco-total-item" + linha).attr('value', precoTotalItem - preco);
        }
    }

    calculaTotalVenda();

}

function calculaTotalVenda() {
    if (listaItens.length > 0) {
        listaItens.forEach(function (item) {
            valorTotal += parseFloat($("#preco-total-item" + item.id).val());
        });
    }
    $("#total").attr('value', valorTotal);

    valorTotal = 0;
}

function remove(id) {
    var novaLista = [];

    for (var i = 0; i < listaItens.length; i++) {
        if (listaItens[i].id != id) {
            novaLista.push(listaItens[i])
        }
    }

    listaItens = new Array();

    listaItens = novaLista;

    exibeListaItens();
    calculaTotalVenda();
}

function carregaItensPedidoBanco(dados){
    console.log(dados);
    //listaItens.push($.parseJSON(dados));
    //exibeListaItens();
}

function exibeListaItens() {
    $("#tableitem").html("");
    $("#tableitem").append("" +
        "<tr class=\"blue\"><th>Código</th><th>Produto</th><th colspan=\"3\">Quantidade</th><th>Preço</th><th>Total</th><th>Excluir</th></tr>");

    listaItens.forEach(function (item) {
        $("#tableitem").append("" +
            "<tr><td>" +
            item.id + "</td><td>" +
            item.titulo + "</td>" +
            "<td><input type=\"button\" id=\"plus" + item.id + "\" value='-' onclick=\"process(-1, 'sub'," + item.id + ")\" /></td><td><input id=\"quant" + item.id + "\" name=\"quant\" class=\"text\" size=\"10\" type=\"text\" value=\"1\" maxlength=\"5\" disabled=\"disabled\"/></td><td><input type=\"button\" id=\"minus" + item.id + "\" value='+' onclick=\"process(1, 'add'," + item.id + ")\"></td>" +
            "<td> <input type=\"text\" id=\"preco" + item.id + "\"  value=\"" + item.preco + "\" disabled=\"disabled\"/></td>" +
            "<td> <input type=\"text\" id=\"preco-total-item" + item.id + "\"  value=\"" + item.preco + "\" disabled=\"disabled\"/></td><td><input type=\"button\" id=\"remove" + item.id + "\" value='X' onclick=\"remove(" + item.id + ")\" /></td>");

    });
}

function finalizarPedido() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var itensVenda = new Array();
    var cliente_id = $("#cliente option:selected").val();
    var totalPedido = $("#total").val();
    var statusPedido = $("#status option:selected").val();
    var token = $("#token").val();

    if (listaItens.length > 0) {
        listaItens.forEach(function (item) {
            valorTotal = parseFloat($("#preco-total-item" + item.id).val());
            preco = parseFloat($("#preco" + item.id).val());
            qtde = parseFloat($("#quant" + item.id).val());
            produto_id = item.id;

            itensVenda.push({ "produto_id": produto_id, "preco": preco, "qtde": qtde, "total": valorTotal });
        });

        console.log(itensVenda);

        $.ajax({
            type: 'POST',
            url: "/pedido/salvar",
            dataType: "json",
            data: {cliente_id,totalPedido,statusPedido,itensVenda}
            
        }).done(function(result) {

            alert(result);
            window.location.href = "/pedidos";

        }).fail(function(jqXHR,textStatus,errorThrown){
         console.log(errorThrown);
    })
        
        return true;
    } else {
        alert("Não existem itens adicionados a venda!");
        return false;
    }


}

$("#add-campo").click(function () {

    var produto = $("#produtos option:selected").val();
    var quant = $("#quant").val();

    $.ajax({
        'processing': true,
        'serverSide': true,
        type: "GET",
        url: "/ajax/produto/" + produto,
        datatype: "json",
        success: function (produto) {
            listaItens.push($.parseJSON(produto));
            exibeListaItens();
            calculaTotalVenda();
        }


    });

})