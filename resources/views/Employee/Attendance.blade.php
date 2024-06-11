<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <link rel="stylesheet" href="{{ asset('css/Attendance.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">LOG IN</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <button type="button" class="btn btn-brand" data-bs-toggle='modal' data-bs-target='#request_schedule'>
                REQUEST NEW SCHEDULE
            </button>

            <div class="modal fade" id="request_schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">REQUEST YOUR PREFER SCHEDULE</h5>
                        </div>
                        <form action="/Schedule/{{ $employee->employee_id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div>
                                    <label for="requestschedule">SELECT PREFER SCHEDULE</label>
                                    <select name="requestschedule" id="requestschedule">
                                        <option value=""></option>
                                        @foreach ($workschedule as $ws)
                                        <option value="{{ $ws->schedule_id }}">{{ $ws->start_time }} - {{ $ws->end_time }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="reason_for_change_schedule">Reason for change schedule: </label>
                                    <textarea name="reason_for_change_schedule" id="chanage_schedule" style='resize: none;'></textarea>
                                </div>
                            </div>
                            <button type="button" class="btn btn-grey" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-green" type="submit">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="Form_Input_Section" data-aos="zoom-in" data-aos-duration="600">
        <p class="Form_Title">YOUR CURRENT SCHEDULE IS {{ $schedule->start_time->format('h:i A') }} - {{ $schedule->end_time->format('h:i
            A') }}</p>
    </div>
    <div class="Attendance_Time" data-aos="zoom-in" data-aos-duration="600">
        <p id="realtime-date">{{ date('h:i:s') }}</p>
    </div>

    <div class="Form_Section" data-aos="zoom-in" data-aos-duration="600">
        <div class="Form_Body">

            <form action="/Attendance" method="POST">
                @csrf
                <div class="Form_Input_Section_Column">
                    <label class="Form_Label">Employee ID:</label>
                    <input class="Form_Input" disabled type="text" value="{{ $employee->employee_id }}" />
                    <label class="Form_Label">Employee Name:</label>
                    <input class="Form_Input" disabled type="text" value="{{ $employee-> last_name }}, {{ $employee-> first_name }}">
                    <input hidden type="text" value="{{ $schedule->schedule_id ?? ''}}">
                </div>
                <div class="Form_Input_Section">
                    <select class="Form_Input" name="location_id" id="location_id" required>
                        <option value="">select one</option>
                        @foreach ($locations as $location)
                        <option value="{{ $location->location_id }}">{{ $location->location_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="section">
                    <input type="submit" style="width: 100%" class="btn btn-green" value="LOG IN">
                </div>
            </form>
            <div class="Form_Input_Section" data-aos="zoom-in">
                <form action="/Attendance" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="submit" class="btn btn-red" style="width: 100%" value="LOG OUT">
                </form>
            </div>
        </div>
    </div>

    <div class="List">
        <div class="One_List" data-aos="zoom-in" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <th>Attendance ID</th>
                    <th>Time Log In</th>
                    <th>Time Log Out</th>
                    <th>Date</th>
                </thead>
                <tbody class="body_section">
                    @forelse ($attendance as $a)
                    <tr>
                        <td>{{$a->attendance_id}}</td>
                        <td>{{$a->in_time}}</td>
                        <td>{{$a->out_time}}</td>
                        <td>{{$a->attendance_date->format('Y-m-d')}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">No attendance records found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
















</body>

</html>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>

<script>
    function updateRealtimeDate() {
        var dateElement = document.getElementById('realtime-date');
        var currentDate = new Date();
        var formattedDate = currentDate.toLocaleString('en-GB', {
            hour12: false
        });
        dateElement.textContent = formattedDate;
    }
    updateRealtimeDate();
    setInterval(updateRealtimeDate, 1000);

</script>
