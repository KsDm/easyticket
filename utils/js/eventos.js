var table = "";

$(document).ready(function() {
	$("#iptHorario").mask("99:99");
	$("#horario").mask("99:99");

	modalExcluirEvento();
	modalAlterarEvento();
	
	$("#addCategoria").hide();
	$("#btnAddEvento").hide();
	
	tableEvento = $('#tblEventos').DataTable({
    	"oLanguage": {
	        "sEmptyTable": "Nenhum registro encontrado.",
	        "sInfo": "_TOTAL_ registros",
	        "sInfoEmpty": "0 Registros",
	        "sInfoFiltered": "(De _MAX_ registros)",
	        "sInfoPostFix":    "",
	        "sInfoThousands":  ".",
	        "sLengthMenu": "Mostrar _MENU_ registros por pagina",
	        "sLoadingRecords": "Carregando...",
	        "sProcessing":     "Processando...",
	        "sZeroRecords": "Nenhum registro encontrado.",
	        "sSearch": "Pesquisar",
	        "oPaginate": {
	            "sNext": "Proximo",
	            "sPrevious": "Anterior",
	            "sFirst": "Primeiro",
	            "sLast":"Ultimo"
	           }
	        },
    	"ajax" : "eventos/listar_eventos",
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets": 6,
            "data": null,
            "defaultContent": "<a href='#alterarEvento' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#exlcuirEvento' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a>"
        }
        ],
    	"columns" : [{"data" : "idevento"}, {"data" : "nomeEvento"}, {"data" : "data"}, {"data" : "horario"}, {"data" : "preco"} , {"data" : "nomeCategoria"}]
    });
    
    $("#btnAddCategoria").click(function(){
    	$("#addCategoria").show('slow');
    	$("#formEvento").hide();
    	$("#btnAddCategoria").hide();
    	$("#btnAddEvento").show();
    });
    
     $("#btnAddEvento").click(function(){
     	$("#addCategoria").hide('slow');
     	$("#formEvento").show();
     	$("#btnAddCategoria").show();
     	$("#btnAddEvento").hide();
     });
    
});


function modalExcluirEvento(){
	$("#tblEventos tbody").on("click", ".btn-excluir", function () {
		var data = tableEvento.row( $(this).parents('tr') ).data();
		$(".spanNomeEvento").html(data["nomeEvento"]);
		$(".spanIdEvento").val(data["idevento"]);
	 });
}

function modalAlterarEvento(){
	$("#tblEventos tbody").on("click", ".btn-alterar", function () {
		var data = tableEvento.row( $(this).parents('tr') ).data();
		var titleOption = $("#fk_categoria option");

		var nomeCategoria = data["nomeCategoria"];
		$("#fk_categoria option[title='"+nomeCategoria+"']").attr("selected","selected");
		
		$(".iptIdEvento").val(data["idevento"]);
		$(".iptIdCategoria").val(data["idcategoria"]);
		$("#iptNomeEvento").val(data["nomeEvento"]);
		$("#iptData").val(data["data"]);
		$("#iptPrecoAlterar").val(data["preco"]);
		$("#iptHorario").val(data["horario"]);
	 });
}

function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){  
    var sep = 0;  
    var key = '';  
    var i = j = 0;  
    var len = len2 = 0;  
    var strCheck = '0123456789';  
    var aux = aux2 = '';  
    var whichCode = (window.Event) ? e.which : e.keyCode;  
    if (whichCode == 13) return true;  
    key = String.fromCharCode(whichCode); // Valor para o código da Chave  
    if (strCheck.indexOf(key) == -1) return false; // Chave inválida  
    len = objTextBox.value.length;  
    for(i = 0; i < len; i++)  
        if ((objTextBox.value.charAt(i) != '0') && (objTextBox.value.charAt(i) != SeparadorDecimal)) break;  
    aux = '';  
    for(; i < len; i++)  
        if (strCheck.indexOf(objTextBox.value.charAt(i))!=-1) aux += objTextBox.value.charAt(i);  
    aux += key;  
    len = aux.length;  
    if (len == 0) objTextBox.value = '';  
    if (len == 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;  
    if (len == 2) objTextBox.value = '0'+ SeparadorDecimal + aux;  
    if (len > 2) {  
        aux2 = '';  
        for (j = 0, i = len - 3; i >= 0; i--) {  
            if (j == 3) {  
                aux2 += SeparadorMilesimo;  
                j = 0;  
            }  
            aux2 += aux.charAt(i);  
            j++;  
        }  
        objTextBox.value = '';  
        len2 = aux2.length;  
        for (i = len2 - 1; i >= 0; i--)  
        objTextBox.value += aux2.charAt(i);  
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);  
    }  
    return false;  
}  
