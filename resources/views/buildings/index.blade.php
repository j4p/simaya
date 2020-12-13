@extends('layouts/default')

{{-- Page title --}}
@section('title')
{{ trans('general.buildings') }}
@parent
@stop

@section('header_right')
  @can('create', \App\Models\Building::class)
  <a href="{{ route('buildings.create') }}" class="btn btn-primary pull-right"> {{ trans('general.create') }}</a>
  @endcan
@stop

{{-- Page content --}}
@section('content')

<div class="row">
  <div class="col-md-12">

    <div class="box box-default">
      <div class="box-body">
        <table
                data-columns="{{ \App\Presenters\BuildingPresenter::dataTableLayout() }}"
                data-cookie-id-table="buildingsTable"
                data-pagination="true"
                data-id-table="buildingsTable"
                data-search="true"
                data-side-pagination="server"
                data-show-columns="true"
                data-show-export="true"
                data-show-footer="true"
                data-show-refresh="true"
                data-sort-order="asc"
                data-sort-name="name"
                data-toolbar="#toolbar"
                id="buildingsTable"
                class="table table-striped snipe-table"
                data-url="{{ route('api.buildings.index') }}"
                data-export-options='{
                "fileName": "export-buildings-{{ date('Y-m-d') }}",
                "ignoreColumn": ["actions","image","change","checkbox","checkincheckout","icon"]
                }'>
        </table>

      </div><!-- /.box-body -->
    </div><!-- /.box -->

  </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->
@stop

@section('moar_scripts')
@include ('partials.bootstrap-table', ['exportFile' => 'buildings-export', 'search' => true,'showFooter' => true, 'columns' => \App\Presenters\BuildingPresenter::dataTableLayout()])
@stop
