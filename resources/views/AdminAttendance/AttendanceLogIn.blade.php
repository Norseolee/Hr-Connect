<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminAttendanceLogin.css')}}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">LOG IN</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Attendance/Log">BACK</a>
        </div>
    </div>

    <div class="row justify-content-center" data-aos="zoom-in" data-aos-duration="600">
        <div class="col-md-11">
            <p id="realtime-date">{{ date('h:i:s') }}</p>
        </div>
    </div>
    <div class="row justify-content-center" data-aos="zoom-in" data-aos-duration="600">
        <div class="col-md-11">
            <div class="card">
                <div class="card-body">
                    <form action="/Admin/Attendance/Log" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employee_id">Employee Name: </label>
                            <select name="employee_id" id="employee_id" required>
                                <option value="">Name</option>
                                @foreach ($employee as $employee)
                                <option value="{{ $employee->employee_id }}">{{ $employee-> last_name }}, {{ $employee-> first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="location_id" id="location_id" required>
                                <option value="">select one</option>
                                @foreach ($locations as $location)
                                <option value="{{ $location->location_id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="section">
                            <input type="submit" class="btn btn-green" value="LOG IN">
                        </div>
                    </form>
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
