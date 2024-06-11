<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminCreateLeave.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">CREATE LEAVE TYPE</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Leave">BACK</a>
        </div>
    </div>

    <div class="List">
        <div class="One_List" data-aos="zoom-in-right" data-aos-duration="600">
            <div class="Form_Section">
                <div class="Form_Body">
                    <div class="Form_Title_Section">
                        <p class="Form_Title">Create Leave Type</p>
                    </div>
                    <form action="/Admin/Leave/Create" method="POST">
                        @csrf
                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="leave_type_name">Leave Type: </label>
                            <input class="Form_Input" type="text" name="leave_type_name" id="leave_type_name" required>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-green" value="Create Leave Type">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="Two_List" data-aos="zoom-in-left" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>leave ID</th>
                        <th>Leave Type</th>
                    </tr>
                </thead>
                <tbody class="body_section">
                    @forelse($leave as $l)
                    <tr>
                        <td>{{$l->leavetype_id}}</td>
                        <td>{{$l->leave_type_name}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td cols='2'>No Leave Type Information</td>
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
