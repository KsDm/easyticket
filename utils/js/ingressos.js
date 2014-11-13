var table = "";

$(document).ready(function() {
	
	modalExcluirCliente();
	modalAlterarCliente();
	modalEfetuarCompra();
	
    table = $('#tblClientes').DataTable({
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
    	"ajax" : "ingressos/listar_clientes",
    	 "columnDefs": [
    	 {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
         },
    	 {
            "targets": 3,
            "data": null,
            "defaultContent": "<a href='#alterarUsuario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-success btn-alterar'><i class='glyphicon glyphicon-refresh'></i></a> <a href='#excluirUsuario' data-toggle='modal' id='modal-30777' role='button' class='btn btn-danger btn-excluir'><i class='glyphicon glyphicon-trash'></i></a> <a href='#efetuarCompra' data-toggle='modal' id='modal-30777' role='button' class='btn btn-info btn-comprar'><i class='glyphicon glyphicon-shopping-cart'></i></a>"
        }
        ],
    	"columns" : [{"data" : "idcliente"}, {"data" : "nome"}, {"data" : "cpf"}]
    });
    
    
    $("#nmevento option").click(function(){
    	var nomeEvento = $("#nmevento option:selected").val();
    	$("#valor").val(nomeEvento);	
    });
    
});


function modalExcluirCliente(){
	$("#tblClientes tbody").on("click", ".btn-excluir", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$(".spanNmUsuario").append(data["nmusuario"]);
		$("#spanIdUsuario").val(data["idusuario"]);
	 });
}

function modalAlterarCliente(){
	$("#tblClientes tbody").on("click", ".btn-alterar", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$("#iptIdUsuario").val(data["idusuario"]);
		$("#itpNmUsuario").val(data["nmusuario"]);
		var status = data["fgstatus"];
		$("#iptFgStatus option[title='"+status+"']").attr("selected","selected");
		$("#iptLogin").val(data["login"]);
		$("#iptPerfil").val(data["perfil"]);
	 });
}

function modalEfetuarCompra(){
	$("#tblClientes tbody").on("click", ".btn-comprar", function () {
		var data = table.row( $(this).parents('tr') ).data();
		$("#iptIdCliente").val(data["idcliente"]);
	 });
}


