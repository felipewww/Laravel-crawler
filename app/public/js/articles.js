$(document).ready(function () {
    new Articles();
});

function Articles() {

    this.constructor = function ()
    {
        this.setDatatables();
    };

    this.setDatatables = function ()
    {
        let table = $('#myTable').DataTable({
            dom: 'Bfrtip',
            processing: true,
            serverSide: true,
            select: true,
            ajax: {
                url: '/admin/articles/list',
                type: "POST"
            },
            searching: false,
            ordering: false,
            columns: [
                { "data": "titulo" },
                { "data": "resumo" },
                { "data": "link" },
            ],
            buttons: [
                {
                    text: 'Deletar selecionados',
                    action: function () {

                        mainScript.loadingModal.show();

                        // var count = table.rows( { selected: true } ).count();
                        let selectedIdxs = table.rows({ selected: true })[0];
                        let data = table.ajax.json().data;

                        let selectedData = (function () {
                            let arr = [];

                            for(let idx in selectedIdxs){
                               let position = selectedIdxs[idx];
                               arr.push(data[position].id);
                            }

                            return arr;
                        })();

                        $.ajax({
                            url: '/admin/articles/deleteSelecteds',
                            method: 'post',
                            data: { articles: selectedData },
                            success: function () {
                                window.location.reload();
                            },
                            error: function (err) {
                                let error = err.responseJSON;
                                mainScript.swal.error(error.message);
                            },
                            complete: function () {
                                mainScript.loadingModal.hide();
                            }
                        })
                    }
                }
            ]

        });
    };

    this.constructor();
}

