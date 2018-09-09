@extends('default')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/js/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="/js/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="/js/DataTables/Buttons-1.5.2/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/js/DataTables/Select-1.2.6/js/dataTables.select.js"></script>
    <script type="text/javascript" src="/js/articles.js"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-block">
                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Resumo</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
