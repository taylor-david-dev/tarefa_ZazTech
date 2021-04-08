$("#nome_pessoa_busca").keyup(function () {
    $.ajax({
        crossDomain: true,
        type: "POST",
        url: "http://thinkdev.com.br/tarefa/pessoa/doPesquisaPessoaAjax",
        data: {cod: $("#nome_pessoa_busca").val()},
        cache: false,
        success: function (data) {
            $('#result_pessoa').html(data);
        }
    });
});

$('#datetimepicker_mask').datetimepicker({
    mask: '99/19/9999'
});
$('.adatetimepicker_mask').datetimepicker({
    mask: '99/19/9999 29:59'
});

$('.remove_pessoa').click(function(){
    $('#pessoa_id').val('');
    $('#nome_pessoa').val('');
});

function pegaValorTRPessoaAjax(linha) {
    $(linha).each(function () {
        $('#pessoa_id').val($(this.cells[0]).text());
        $('#nome_pessoa').val($(this.cells[1]).text());
    });

    $('#myModalPessoa').modal('toggle');
    //alert($(this).find('td').eq(1).html())
}