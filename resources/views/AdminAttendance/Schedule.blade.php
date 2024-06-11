<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminSchedule.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">SCHEDULE</h1>

        <div class="button" style="margin-left: 10px;" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Attendance">BACK</a>
        </div>
    </div>

    <div class="List">
        <div class="One_List" data-aos="zoom-in-right" data-aos-duration="600">
            <div class="Form_Section">
                <div class="Form_Body">
                    <div class="Form_Title_Section">
                        <h2 class=" Form_Title">Create Schedule</h2>
                    </div>
                    <form action="/Admin/Attendance/Schedule" method="POST">
                        @csrf
                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="start_time">Start Time:</label>
                            <input class="Form_Input" type="time" id="start_time" name="start_time" required>
                        </div>

                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="end_time">End Time:</label>
                            <input class="Form_Input" type="time" id="end_time" name="end_time" required>
                            <br>
                        </div>

                        <div class="section">
                            <input class="btn btn-green" type="submit" value="Create Schedule">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="Two_List" data-aos="zoom-in-left" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>Schedule ID</th>
                        <th>Schedule List</th>
                    </tr>
                </thead>
                <tbody class="body_section">
                    @foreach ($schedule as $schedule)
                    <tr>
                        <td>{{$schedule->schedule_id}}</td>
                        <td>{{$schedule->start_time->format('h:i A')}} - {{$schedule->end_time->format('h:i A')}}</td>
                    </tr>
                    @endforeach
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
