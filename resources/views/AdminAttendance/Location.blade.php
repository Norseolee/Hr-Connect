<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminLocation.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">LOCATION</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Attendance">Back</a>
        </div>
    </div>

    <div class="List">
        <div class="One_List" data-aos="zoom-in-right" data-aos-duration="600">
            <div class="Form_Section">
                <div class="Form_Body">
                    <div class="Form_Title_Section">
                        <h2 class="Form_Title">Create Location</h2>
                    </div>
                    <form action="/Admin/Attendance/Location" method="POST">
                        @csrf
                        <div class="Form_Input_Section">
                            <label class="Form_Label" for="Location">Location: </label>
                            <input class="Form_Input" type="text" id="Location" name="Location" required>
                        </div>
                        <input class="btn btn-green" type="submit" value="Create Location">
                    </form>
                </div>
            </div>
        </div>
        <div class="Two_List" data-aos="zoom-in-left" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th>ID</th>
                        <th>location List</th>
                    </tr>
                </thead>
                <tbody class="body_section">
                    @foreach ($location as $location)
                    <tr>
                        <td>{{$location->location_id}}</td>
                        <td>{{$location->location_name}}</td>
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
