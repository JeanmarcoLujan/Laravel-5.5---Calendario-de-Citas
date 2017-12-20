@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.appointments.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.client')</th>
                            <td field-key='client'>{{ $appointment->client->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.employee')</th>
                            <td field-key='employee'>{{ $appointment->employee->first_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.start-time')</th>
                            <td field-key='start_time'>{{ $appointment->start_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.finish-time')</th>
                            <td field-key='finish_time'>{{ $appointment->finish_time }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.appointments.fields.comments')</th>
                            <td field-key='comments'>{!! $appointment->comments !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.appointments.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
