<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminLeave.css') }}">
    <title>HR Connect | Leave</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">LEAVE</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Leave/Create" data-aos="zoom-in">Leave Types</a>
        </div>
    </div>

    @foreach ($leave as $l)
    <div class="modal fade" id="delete_{{$l->leave_id}}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/Leave/{{$l->leave_id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="Form_Input_Section">
                            <p class="Form_Label">Reason of Leave</p>
                            <p class="Form_Input">{{ $l->leave_reason ?? ' ' }}</p>
                        </div>
                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="status">What would you like to do?</label>
                            <select name="status" id="status" class="Form_Input">
                                <option value="">Select an option</option>
                                <option value="Approved">Approved</option>
                                <option value="Denied">Denied</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button class="btn btn-green" type="submit">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="List" data-aos="zoom-in-up" data-aos-duration="600">
        <div class="One_List">
            <table>
                <thead class='thead_section'>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Approval</th>
                    </tr>
                </thead>
                <tbody class="body_section">
                    @forelse ($leave as $l)
                    <tr>
                        <td>{{ $l->employee_id }}</td>
                        @foreach($employee as $e)
                        @if ($e->employee_id === $l->employee_id)
                        <td>{{ $e->first_name }} {{ $e->last_name }}</td>
                        @endif
                        @endforeach
                        <td>{{ $l->start_date }}</td>
                        <td>{{ $l->end_date }}</td>
                        <td>{{ $l->status }}</td>
                        <td>
                            <a class="btn btn-brand" data-bs-toggle='modal' data-bs-target='#delete_{{$l->leave_id}}'>information</a>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="6">No Leave Information</td>
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
