@extends('layouts.app')

@section('css')
@endsection

@section('title')
    {{ trans('live.title') }}
@endsection

@section('description')
    {{ trans('live.situation') }}
@endsection

@section('breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                {!! Breadcrumbs::render('live') !!}
            </div>
        </div>	
    </div>
@endsection

@section('content')
<div class="container px-0">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('partials.message')
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ trans('live.title') }}
                </div>

                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 pb-2">
                                @include('partials.onair')
                                {!! trans('live.description') !!}
                            </div>
                            <div class="col-12 pb-2">
                                <img src="{{ asset('images/logo.png') }}" class="w-100 logo bg-white numberCircle" alt="EmployMed Logo"/>
                            </div>
                            <div class="col-12 pb-2">
                                @include('partials.live')
                            </div>
                            @if(count($lives) > 0)
                                <div class="col-12">
                                    <table id="tableId" class="display">
                                        <thead>
                                            <tr>
                                                <th>
                                                    {{ trans('company.company_name')}}
                                                </th>
                                                <th>
                                                    {{ trans('live.status') }}
                                                </th>
                                                <th>
                                                    {{ trans('company.company_city')}}
                                                </th>
                                                <th>
                                                    {{ trans('live.link')}}
                                                </th>
                                                <th>
                                                    {{ trans('email.message')}}
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($lives as $live)
                                                <tr>
                                                    <td>{{ $live->company_name }}</td>
                                                    <td>
                                                        @if($live->status === 1)
                                                            <span class="text-success">
                                                                {{ trans('live.employs') }}
                                                            </span>
                                                        @elseif($live->status === 2)
                                                            <span class="text-warning">
                                                                {{ trans('live.waiting') }}
                                                            </span>
                                                        @elseif($live->status === 3)
                                                            <span class="text-danger">
                                                                {{ trans('live.releases') }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $live->city }}</td>
                                                    <td>{{ $live->link }}</td>
                                                    <td>{{ $live->comment }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dc7278fb46e12ce"></script>
<script type="text/javascript">
    var table = $('#tableId').dataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );

    table.on( 'search.dt', function () {
        $('#filterInfo').html( 'Currently applied global search: '+table.search() );
    } );
</script>
@endsection