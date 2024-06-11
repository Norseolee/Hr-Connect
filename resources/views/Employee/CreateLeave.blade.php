<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/CreateLeave.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">Request Leave</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Leave">BACK</a>
        </div>
    </div>

    <div class="Form_Section" data-aos="zoom-in-up" data-aos-duration="600">
        <div class="Form_Body">
            <form action="/Leave" method="POST" id="leaveForm">
                @csrf
                <div class="Form_Input_Section">
                    <label class="Form_Label" for="start_date">Start</label>
                    <input class="Form_Input" type="date" name="start_date" id="start_date" required>
                    <label class="Form_Label" for="end_date">End</label>
                    <input class="Form_Input" type="date" name="end_date" id="end_date" required>
                    <input type="text" hidden value="Pending" name="status" id="status" required>
                </div>
                <div class="Form_Input_Section">
                    <label class="Form_Label" for="leavetype_id">Leave Type</label>
                    <select class="Form_Input" name="leavetype_id" id="leavetype_id" required>
                        <option value=""></option>
                        @foreach ($leavelist as $leave)
                        <option value="{{ $leave->leavetype_id }}">{{ $leave->leave_type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="Form_Input_Section">
                    <label class="Form_Label" for="leave_reason">Reason of Leave: </label>
                    <textarea class="Form_Input" name="leave_reason" id="leave_reason" cols="30" rows="10" style="resize: none" required></textarea>
                </div>
                <input type="submit" class="btn btn-green" value="Request Leave">
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var startDateInput = document.getElementById('start_date');
            var endDateInput = document.getElementById('end_date');

            // Set min attribute for start_date to today
            startDateInput.min = new Date().toISOString().split('T')[0];

            // Add event listener for start_date change to update min attribute for end_date
            startDateInput.addEventListener('change', function() {
                endDateInput.min = startDateInput.value;
            });
        });

    </script>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
