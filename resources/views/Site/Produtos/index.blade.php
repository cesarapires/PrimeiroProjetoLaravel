@extends('Layout.site')

@section('content')

<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Produtos | <button class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modalNewProduct">
                        <i class="fas fa-plus"></i>
                        Novo</button>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">NSD Dashboard v1 | Produtos</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="produtos" class="table table-bordered table-striped">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="filterStock" checked>
                                            <label class="form-check-label">Mostrar apenas produtos em estoque</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Seleção de tamanho</label>
                                        <div class="input-group date" data-target-input="nearest">
                                            <div class="btn-group">
                                                <button type="button" id="sizeUn" class="btn btn-default">Un</button>
                                                <button type="button" id="sizeP" class="btn btn-default">P</button>
                                                <button type="button" id="sizeM" class="btn btn-default">M</button>
                                                <button type="button" id="sizeG" class="btn btn-default">G</button>
                                                <button type="button" id="sizeGG" class="btn btn-default">GG</button>
                                                <button type="button" id="exitFilter" class="btn btn-default"><i
                                                        class="fas fa-times"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Seleção de tipo</label>
                                            <select class="form-control">
                                                <option>Todos</option>
                                                <option>option 2</option>
                                                <option>option 3</option>
                                                <option>option 4</option>
                                                <option>option 5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>URL</th>
                                    <th>Descrição</th>
                                    <th>Tamanho</th>
                                    <th>Cor</th>
                                    <th>Estoque</th>
                                    <th>Custo</th>
                                    <th>Venda</th>
                                    <th>Tipo</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $products)
                                <tr class="text-center">
                                    <td class='product_id'>{{$products->product_id}}</td>
                                    <td class='url'>{{$products->url}}</td>
                                    <td class='name'>{{$products->name}}</td>
                                    <td class='size_name'>{{$products->size_name}}</td>
                                    <td class='color_name'>{{$products->color}}</td>
                                    <td class='stock'>{{$products->stock}}</td>
                                    <td class='price_buy'>R$ {!!number_format($products->price_buy,2, ',', ' ')!!}</td>
                                    <td class='price_sell'>R$ {!!number_format($products->price_sell,2, ',', ' ')!!}
                                    </td>
                                    <td class='type_name'>{{$products->type_name}}</td>
                                    <td class="project-actions text-right text-center edit">
                                        <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal"
                                            data-target="#modaleditproduct" data-whatever='{{$products->product_id}}'>
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Editar
                                        </button>
                                        <button class="btnEdit btn btn-outline-danger btn-sm" data-toggle="modal"
                                            data-target="#modalDeleteProduct" data-whatever='{
                                                "idProduct":"{{$products->product_id}}",
                                                "nameProduct":"{{$products->name}}"
                                                }'>
                                            <i class="fas fa-trash">
                                            </i>
                                            Apagar
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script>
testSize() {
    if ($("#sizeUn").hasClass("active")) {
        if (aDate[3] == 'Un') {
            return true;
        } else {
            return false;
        }
    } else if ($("#sizeP").hasClass("active")) {
        if (aDate[3] == 'P') {
            return true;
        } else {
            return false;
        }
    } else if ($("#sizeM").hasClass("active")) {
        if (aDate[3] == 'M') {
            return true;
        } else {
            return false;
        }
    } else if ($("#sizeG").hasClass("active")) {
        if (aDate[3] == 'G') {
            return true;
        } else {
            return false;
        }
    } else if ($("#sizeGG").hasClass("active")) {
        if (aDate[3] == "GG") {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}


$(document).ready(function() {

});

var tablaTransacciones = $('#produtos');

var tablaTransacciones_dt = null

// The plugin function for adding a new filtering routine
$.fn.dataTableExt.afnFiltering.push(
    function(oSettings, aDate, iDataIndex) {
        if ($('#filterStock').is(':checked')) {
            if (aDate[5] > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }


    });

$(function() {
    tablaTransacciones_dt = tablaTransacciones.DataTable({
        "columnDefs": [{
            "targets": [1],
            "visible": false,
            "searchable": false
        }],
        language: {
            "emptyTable": "Nenhum registro encontrado",
            "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 até 0 de 0 registros",
            "infoFiltered": "(Filtrados de _MAX_ registros)",
            "infoThousands": ".",
            "loadingRecords": "Carregando...",
            "processing": "Processando...",
            "zeroRecords": "Nenhum registro encontrado",
            "search": "Pesquisar",
            "paginate": {
                "next": "Próximo",
                "previous": "Anterior",
                "first": "Primeiro",
                "last": "Último"
            },
            "aria": {
                "sortAscending": ": Ordenar colunas de forma ascendente",
                "sortDescending": ": Ordenar colunas de forma descendente"
            },
            "select": {
                "rows": {
                    "_": "Selecionado %d linhas",
                    "0": "Nenhuma linha selecionada",
                    "1": "Selecionado 1 linha"
                },
                "1": "%d linha selecionada",
                "_": "%d linhas selecionadas",
                "cells": {
                    "1": "1 célula selecionada",
                    "_": "%d células selecionadas"
                },
                "columns": {
                    "1": "1 coluna selecionada",
                    "_": "%d colunas selecionadas"
                }
            },
            "buttons": {
                "copySuccess": {
                    "1": "Uma linha copiada com sucesso",
                    "_": "%d linhas copiadas com sucesso"
                },
                "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                "colvis": "Visibilidade da Coluna",
                "colvisRestore": "Restaurar Visibilidade",
                "copy": "Copiar",
                "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                "copyTitle": "Copiar para a Área de Transferência",
                "csv": "CSV",
                "excel": "Excel",
                "pageLength": {
                    "-1": "Mostrar todos os registros",
                    "1": "Mostrar 1 registro",
                    "_": "Mostrar %d registros"
                },
                "pdf": "PDF",
                "print": "Imprimir"
            },
            "autoFill": {
                "cancel": "Cancelar",
                "fill": "Preencher todas as células com",
                "fillHorizontal": "Preencher células horizontalmente",
                "fillVertical": "Preencher células verticalmente"
            },
            "lengthMenu": "Exibir _MENU_ resultados por página",
            "searchBuilder": {
                "add": "Adicionar Condição",
                "button": {
                    "0": "Construtor de Pesquisa",
                    "_": "Construtor de Pesquisa (%d)"
                },
                "clearAll": "Limpar Tudo",
                "condition": "Condição",
                "conditions": {
                    "date": {
                        "after": "Depois",
                        "before": "Antes",
                        "between": "Entre",
                        "empty": "Vazio",
                        "equals": "Igual",
                        "not": "Não",
                        "notBetween": "Não Entre",
                        "notEmpty": "Não Vazio"
                    },
                    "number": {
                        "between": "Entre",
                        "empty": "Vazio",
                        "equals": "Igual",
                        "gt": "Maior Que",
                        "gte": "Maior ou Igual a",
                        "lt": "Menor Que",
                        "lte": "Menor ou Igual a",
                        "not": "Não",
                        "notBetween": "Não Entre",
                        "notEmpty": "Não Vazio"
                    },
                    "string": {
                        "contains": "Contém",
                        "empty": "Vazio",
                        "endsWith": "Termina Com",
                        "equals": "Igual",
                        "not": "Não",
                        "notEmpty": "Não Vazio",
                        "startsWith": "Começa Com"
                    },
                    "array": {
                        "contains": "Contém",
                        "empty": "Vazio",
                        "equals": "Igual à",
                        "not": "Não",
                        "notEmpty": "Não vazio",
                        "without": "Não possui"
                    }
                },
                "data": "Data",
                "deleteTitle": "Excluir regra de filtragem",
                "logicAnd": "E",
                "logicOr": "Ou",
                "title": {
                    "0": "Construtor de Pesquisa",
                    "_": "Construtor de Pesquisa (%d)"
                },
                "value": "Valor"
            },
            "searchPanes": {
                "clearMessage": "Limpar Tudo",
                "collapse": {
                    "0": "Painéis de Pesquisa",
                    "_": "Painéis de Pesquisa (%d)"
                },
                "count": "{total}",
                "countFiltered": "{shown} ({total})",
                "emptyPanes": "Nenhum Painel de Pesquisa",
                "loadMessage": "Carregando Painéis de Pesquisa...",
                "title": "Filtros Ativos"
            },
            "searchPlaceholder": "",
            "thousands": ".",
            "datetime": {
                "previous": "Anterior",
                "next": "Próximo",
                "hours": "Hora",
                "minutes": "Minuto",
                "seconds": "Segundo",
                "amPm": [
                    "am",
                    "pm"
                ],
                "unknown": "-"
            },
            "editor": {
                "close": "Fechar",
                "create": {
                    "button": "Novo",
                    "submit": "Criar",
                    "title": "Criar novo registro"
                },
                "edit": {
                    "button": "Editar",
                    "submit": "Atualizar",
                    "title": "Editar registro"
                },
                "error": {
                    "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                },
                "multi": {
                    "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                    "restore": "Desfazer alterações",
                    "title": "Multiplos valores",
                    "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                },
                "remove": {
                    "button": "Remover",
                    "confirm": {
                        "_": "Tem certeza que quer deletar %d linhas?",
                        "1": "Tem certeza que quer deletar 1 linha?"
                    },
                    "submit": "Remover",
                    "title": "Remover registro"
                }
            },
            "decimal": ","
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        "buttons": ["excel", "pdf", "print"]
    }).buttons().container().appendTo('#produtos_wrapper .col-md-6:eq(0)');
    // Create event listeners that will filter the table whenever the user types in either date range box or
    // changes the value of either box using the Datepicker pop-up calendar
});
</script>

<script src="https://momentjs.com/downloads/moment.min.js"></script>

<script>
$('#filterStock').on('click', function() {
    $('#produtos').DataTable().draw();
});

$('#sizeUn').on('click', function() {
    $("#sizeUn").addClass('active');
    $("#sizeP").removeClass('active');
    $("#sizeM").removeClass('active');
    $("#sizeG").removeClass('active');
    $("#sizeGG").removeClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeP').on('click', function() {
    $("#sizeUn").removeClass('active');
    $("#sizeP").addClass('active');
    $("#sizeM").removeClass('active');
    $("#sizeG").removeClass('active');
    $("#sizeGG").removeClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeM').on('click', function() {
    $("#sizeUn").removeClass('active');
    $("#sizeP").removeClass('active');
    $("#sizeM").addClass('active');
    $("#sizeG").removeClass('active');
    $("#sizeGG").removeClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeG').on('click', function() {
    $("#sizeUn").removeClass('active');
    $("#sizeP").removeClass('active');
    $("#sizeM").removeClass('active');
    $("#sizeG").addClass('active');
    $("#sizeGG").removeClass('active');
    $('#produtos').DataTable().draw();
});

$('#sizeGG').on('click', function() {
    $("#sizeUn").removeClass('active');
    $("#sizeP").removeClass('active');
    $("#sizeM").removeClass('active');
    $("#sizeG").removeClass('active');
    $("#sizeGG").addClass('active');
    $('#produtos').DataTable().draw();
});

$('#exitFilter').on('click', function() {
    $("#sizeUn").removeClass('active');
    $("#sizeP").removeClass('active');
    $("#sizeM").removeClass('active');
    $("#sizeG").removeClass('active');
    $("#sizeGG").removeClass('active');
    $('#produtos').DataTable().draw();
});
</script>


@include('Site.Produtos.Modais.new')
@include('Site.Produtos.Modais.delete')
@include('Site.Produtos.Modais.edit')

@endsection('content')