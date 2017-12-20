@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.working-hours.title')</h3>
    @can('working_hour_create')
    <p>
        <a href="{{ route('admin.working_hours.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('working_hour_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.working_hours.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.working_hours.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.css">
    <div id="calendar"></div>
    
@stop

@section('javascript') 
    <script type="text/javascript" src ="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/locale/es.js"></script>

    <script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            defaultView: 'agendaWeek',
            events: [
                @foreach($working_hours as $hour){
                    title:'{{ $hour->employee->first_name.' '.$hour->employee->last_name }}',
                    start:'{{ $hour->date .' '. $hour->start_time }}',
                    end:'{{ $hour->date .' '. $hour->finish_time }}',
                    url: "{{ route('admin.working_hours.edit',$hour->id) }}"

                },
                @endforeach
            ],
            lang: 'es',
            //eventColor: '#378006',
            header: {
                left: '',
                center: 'prev title next',
                right: 'month,agendaWeek,agendaDay'
            },
            /*

            eventRender: function (event, element) {
                element.attr('href', 'javascript:void(0);');
                element.click(function() {
                    $("#startTime").html(moment(event.start).format('MMM Do h:mm A'));
                    $("#endTime").html(moment(event.end).format('MMM Do h:mm A'));
                    $("#eventInfo").html(event.description);
                    $("#eventLink").attr('href', event.url);
                    $("#eventContent").dialog({ modal: true, title: event.title, width:350});
                });
            }
            */
        });
        
    });

        

    </script>
@endsection