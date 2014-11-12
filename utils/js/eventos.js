var table = "";

$(document).ready(function() {
	
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
            "targets": 5,
            "data": null,
            "defaultContent": "<a href='#alterarEvento' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#exlcuirEvento' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a>"
        }
        ],
    	"columns" : [{"data" : "idevento"}, {"data" : "nomeEvento"}, {"data" : "data"}, {"data" : "horario"}, {"data" : "nomeCategoria"}]
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
		$("#iptHorario").val(data["horario"]);
	 });
}

