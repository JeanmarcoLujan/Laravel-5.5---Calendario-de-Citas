@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.working-hours.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.employee')</th>
                            <td field-key='employee'>{{ $working_hour->employee->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.date')</th>
                            <td field-key='date'>{{ $working_hour->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.start-time')</th>
                            <td field-key='start_time'>{{ $working_hour->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.working-hours.fields.finish-time')</th>
                            <td field-key='finish_time'>{{ $working_hour->finish_time }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.working_hours.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
