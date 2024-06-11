<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminAttendanceLoglist.css') }}">
    <title>HR Connect</title>

</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">LOG LIST</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Attendance">BACK</a>
            <a class="btn btn-green" href="/Admin/Attendance/Log/create">Log In</a>
        </div>
    </div>

    <div class="List" data-aos="zoom-in" data-aos-duration="600">
        <div class="One_List">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>Attendance ID</th>
                        <th>Employee ID</th>
                        <th>Time Log In</th>
                        <th>Time Log Out</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class='body_section'>
                    @forelse ($attendance as $a)
                    <tr>
                        <td>{{$a->attendance_id}}</td>
                        <td>{{$a->employee_id}}</td>
                        <td>{{$a->in_time->format('H-i-s')}}</td>
                        <td>{{$a->out_time->format('H-i-s')}}</td>
                        <td>{{$a->attendance_date}}</td>
                        <td>
                            @if (empty($a->out_time) && empty($a->out_status) || $a->out_time === null && $a->out_status === null)
                            <button type="button" class="btn btn-red" data-bs-toggle='modal' data-bs-target='#logout_{{$a->attendance_id}}'>
                                LOG OUT
                            </button>
                            @endif
                        </td>
                    </tr>
                    <div class="modal fade" id="logout_{{$a->attendance_id}}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">


                                <div class="modal-header">
                                    <h4 class="modal-title">Do you want to Log Out?</h4>

                                </div>


                                <div class="modal-body">
                                    <div>
                                        <p id="realtime-date">{{ date('h:i:s') }}</p>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-grey" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <form action="{{ route('Log.update', $a->attendance_id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="submit" class="btn btn-red" style="width: 100%" value="LOG OUT">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td class="col-6">No Log List Information</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
    });

</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
