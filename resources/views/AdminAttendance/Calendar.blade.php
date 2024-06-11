<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <link rel="stylesheet" href="/css/calendar.css">
</head>

<body class="bodyCalendar">
    <div>
        <a class="btn" href="/Admin/Attendance"> Back </a>
    </div>
    <div id="container">
        <div id="header">
            <div id="monthDisplay"></div>
            <div>
                <button id="backButton">Back</button>
                <button id="nextButton">Next</button>
            </div>
        </div>

        <div id="weekdays">
            <div>Sunday</div>
            <div>Monday</div>
            <div>Tuesday</div>
            <div>Wednesday</div>
            <div>Thursday</div>
            <div>Friday</div>
            <div>Saturday</div>
        </div>

        <div id="calendar"></div>
    </div>

    <!-- <div id="newEventModal">
        <h2>New Event</h2>

        <input id="eventTitleInput" placeholder="Event Title" />

        <button id="saveButton">Save</button>
        <button id="cancelButton">Cancel</button>
    </div>

    <div id="deleteEventModal">
        <h2>Event</h2>

        <p id="eventText"></p>

        <button id="deleteButton">Delete</button>
        <button id="closeButton">Close</button>
    </div>

    <div id="modalBackDrop"></div> -->

    <script src="/js/calendar.js"></script>

</body>


</html>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>