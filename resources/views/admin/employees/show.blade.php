@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.employees.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.employees.fields.first-name')</th>
                            <td field-key='first_name'>{{ $employee->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.last-name')</th>
                            <td field-key='last_name'>{{ $employee->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.phone')</th>
                            <td field-key='phone'>{{ $employee->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.employees.fields.email')</th>
                            <td field-key='email'>{{ $employee->email }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#workinghours" aria-controls="workinghours" role="tab" data-toggle="tab">Working hours</a></li>
<li role="presentation" class=""><a href="#appointments" aria-controls="appointments" role="tab" data-toggle="tab">Appointments</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="workinghours">
<table class="table table-bordered table-striped {{ count($working_hours) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.working-hours.fields.employee')</th>
                        <th>@lang('quickadmin.working-hours.fields.date')</th>
                        <th>@lang('quickadmin.working-hours.fields.start-time')</th>
                        <th>@lang('quickadmin.working-hours.fields.finish-time')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($working_hours) > 0)
            @foreach ($working_hours as $working_hour)
                <tr data-entry-id="{{ $working_hour->id }}">
                    <td field-key='employee'>{{ $working_hour->employee->first_name or '' }}</td>
                                <td field-key='date'>{{ $working_hour->date }}</td>
                                <td field-key='start_time'>{{ $working_hour->start_time }}</td>
                                <td field-key='finish_time'>{{ $working_hour->finish_time }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('working_hour_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.working_hours.restore', $working_hour->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('working_hour_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.working_hours.perma_del', $working_hour->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('working_hour_view')
                                    <a href="{{ route('admin.working_hours.show',[$working_hour->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('working_hour_edit')
                                    <a href="{{ route('admin.working_hours.edit',[$working_hour->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('working_hour_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.working_hours.destroy', $working_hour->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="appointments">
<table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.appointments.fields.client')</th>
                        <th>@lang('quickadmin.appointments.fields.employee')</th>
                        <th>@lang('quickadmin.appointments.fields.start-time')</th>
                        <th>@lang('quickadmin.appointments.fields.finish-time')</th>
                        <th>@lang('quickadmin.appointments.fields.comments')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($appointments) > 0)
            @foreach ($appointments as $appointment)
                <tr data-entry-id="{{ $appointment->id }}">
                    <td field-key='client'>{{ $appointment->client->first_name or '' }}</td>
                                <td field-key='employee'>{{ $appointment->employee->first_name or '' }}</td>
                                <td field-key='start_time'>{{ $appointment->start_time }}</td>
                                <td field-key='finish_time'>{{ $appointment->finish_time }}</td>
                                <td field-key='comments'>{!! $appointment->comments !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('appointment_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.appointments.restore', $appointment->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('appointment_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.appointments.perma_del', $appointment->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('appointment_view')
                                    <a href="{{ route('admin.appointments.show',[$appointment->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('appointment_edit')
                                    <a href="{{ route('admin.appointments.edit',[$appointment->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('appointment_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.appointments.destroy', $appointment->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.employees.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
