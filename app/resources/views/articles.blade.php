@extends('default')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="/js/DataTables/datatables.min.css"/>
    <script type="text/javascript" src="/js/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="/js/DataTables/Buttons-1.5.2/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="/js/DataTables/Select-1.2.6/js/dataTables.select.js"></script>
    <script type="text/javascript" src="/js/articles.js"></script>
@endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
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
