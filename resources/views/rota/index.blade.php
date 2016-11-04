@extends('layouts.default')

@section('title', 'Table')

@section('content')
    <h1>Rota</h1>

    <table class="table rota">
        <thead>
            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
                <th>Sunday</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rota as $k=>$staff)
            <tr>
                <td>{{ $staff['staff']->full_name  }}</td>
                @foreach($staff['slots'] as $day)
                    <td>
                        @foreach($day as $slot)
                            @if ($slot->slot_type=='dayoff')
                                <p class="bg-success">
                                    Day Off
                                </p>
                            @else
                                <p class="bg-info">
                                    Start {{ $slot->start_time }}<br>
                                    End   {{ $slot->end_time }}
                                </p>
                            @endif
                        @endforeach
                    </td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Total</td>
                @foreach($totals as $total)
                    <td>{{ $total }}</td>
                @endforeach
            </tr>
        </tfoot>
    </table>

@endsection