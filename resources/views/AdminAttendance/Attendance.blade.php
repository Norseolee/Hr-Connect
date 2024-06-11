<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <title>HR Connect | Attendance</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">ATTENDANCE</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a href="/Admin/Attendance/Log" class="btn btn-brand">Log List</a>
            <!-- <a href="/Admin/Attendance/Calendar" class="btn btn-brand">Calendar</a> -->
            <a href="/Admin/Attendance/Schedule" class="btn btn-brand">Schedule</a>
            <a href="/Admin/Attendance/Location" class="btn btn-brand">Location</a>
        </div>
    </div>

    <div class="List_Column">
        @include('partials.Attendace_Table', ['title' => 'Log In List', 'timeKey' => 'in_time'])

        @include('partials.Attendace_Table', ['title' => 'Log Out List', 'timeKey' => 'out_time'])
    </div>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
