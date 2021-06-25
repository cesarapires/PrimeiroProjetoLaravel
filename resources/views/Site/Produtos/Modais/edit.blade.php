<div class="modal fade" id="modaleditproduct">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header" id="titleedt">
                <h4 class="modal-title">Alterar produto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" id="FormEdtProducts" name="FormEdtProducts"
                    action="{{route('Site.ProductsUpdate')}}">
                    @csrf
                    @method('post')

                    <div class="form-group">
                        <div class='row'>
                            <div class='col-12'>
                                <input type="hidden" id="edtid" name="edtid">
                                <label for="inputNameProduct">Descrição</label>
                                <input type="text" class="form-control" name="edtname" id="edtname"
                                    placeholder="Conjunto Alice Ruby">
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                        <div class='row'>
                            <div class='col-9'>
                                <label for="inputStockProduct">Cor</label>
                                <input type="text" class="form-control" name="edtcolor" id="edtcolor"
                                    placeholder="Verde Militar/Nude">
                            </div>
                            <div class='col-3'>
                                <label for="inputStockProduct">Estoque</label>
                                <input type="text" class="form-control" name="edtstock" id="edtstock" placeholder="1">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class='col-6'>
                                <label for="inputPrice_BuyProduct">Custo</label>
                                <input type="text" class="form-control" name="edtpricebuy" id="edtpricebuy"
                                    placeholder="17.99">
                            </div>
                            <div class='col-6'>
                                <label for="inputPrice_SellProduct">Venda</label>
                                <input type="text" class="form-control" name="edtpricesell" id="edtpricesell"
                                    placeholder="54.99">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class='col-6'>
                                <label>Tamanho</label>
                                <select class="form-control select2bs4" name="edtsizeId" id="edtsizeId"
                                    style="width: 100%;">
                                    <option disabled value="">Selecione um tamanho:</option>
                                    @foreach($sizes as $sizes)
                                    <option value="{{$sizes->size_id}}">{{$sizes->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class='col-6'>
                                <label>Tipo</label>
                                <select class="form-control select2bs4" name="edttypeId" id="edttypeId"
                                    style="width: 100%;">
                                    <option disabled value="">Selecione um tipo:</option>
                                    @foreach($types as $types)
                                    <option value="{{$types->type_id}}">{{$types->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice_SellProduct">Data da última atualização</label>
                        <input type="text" class="form-control" name="edtupdateProduct" id="edtupdateProduct" value=""
                            disabled>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice_SellProduct">Data de criação</label>
                        <input type="text" class="form-control" name="edtcreateProduct" id="edtcreateProduct" value=""
                            disabled>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Sair</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
/* When click edit user */
$('#modaleditproduct').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    var idProduct = button.data('whatever');
    $('#titleedt').html(" <h4 class='modal-title'>Editar produto #" + idProduct + "</h4>");
    var requestProduct = "http://127.0.0.1:8000/Produtos/Buscar/" + idProduct;
    alert(requestProduct);
    var exit = search(requestProduct);
    alert(exit);

});

function search(URL) {
    var request = new XMLHttpRequest();
    request.open('GET', URL);
    request.responseType = 'json';
    request.send();
    request.onload = function() {
        var product = request.response;
        return product[0];
    }
}
</script>