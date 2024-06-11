<?php
$currentTime = date('H:i');
$greeting = '';
if ($currentTime >= '05:00' && $currentTime < '12:00') {
    $greeting = 'Good Morning';
} elseif ($currentTime >= '12:00' && $currentTime < '17:00') {
    $greeting = 'Good Afternoon';
} else {
    $greeting = 'Good Evening';
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <title>System</title>
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
</head>


<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">DASHBOARD</h1>
    </div>

    <div class="agenda" data-aos="zoom-in" data-aos-duration="600">
        <p>{{ $greeting }}! {{$employee->first_name}} {{$employee->last_name}}. Here's our agenda for today.</p>
    </div>


    <div class="notification">
        <div class="notice" data-aos="zoom-in-right" data-aos-duration="600">
            <h3 class="font-style">Notice</h3>
            <div class="notice_content">
                <div class=" notice_info">
                    <p>Hod approved OT of BIBI Garcia</p>
                    <p>thurs 7:00pm</p>
                </div>
                <div class="notice_info">
                    <p>Hod approved OT of BIBI Garcia</p>
                    <p>thurs 7:00pm</p>
                </div>
                <div class="notice_info">
                    <p>Hod approved OT of BIBI Garcia</p>
                    <p>thurs 7:00pm</p>
                </div>
            </div>
        </div>

        <div class="event" data-aos="zoom-in-left" data-aos-duration="600">
            <h3 class="font-style">Events</h3>
            <div class="event_content">
                <div class=" event_info">
                    <p>SEMINAR: Healt and Remedy</p>
                    <p>Thurs 10:00AM- 11:30PM</p>
                </div>
                <div class="event_info">
                    <p>SEMINAR: Healt and Remedy</p>
                    <p>Thurs 10:00AM- 11:30PM</p>
                </div>
                <div class="event_info">
                    <p>SEMINAR: Healt and Remedy</p>
                    <p>Thurs 10:00AM- 11:30PM</p>
                </div>
            </div>
        </div>
    </div>
</body>


</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
