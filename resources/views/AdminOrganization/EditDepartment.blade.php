<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminEditDepartment.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">EDIT: {{$department->department_name}}</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Organization/Department/{{$department->department_id}}">Back</a>
        </div>
    </div>

    <div class="Form_Section" data-aos="zoom-in-up" data-aos-duration="600">
        <div class="Form_Body">
            <form action="/Admin/Organization/Department/{{$department->department_id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="Form_Title_Section">
                    <label for="department_name" class="Form_Title">Current Name: <span class="Form_Title_Content">{{ $department-> department_name }}</span></label>
                </div>

                <div class="Form_Input_Section">
                    <label class="Form_Label" for="new_department_name">New Department Name: </label>
                    <input type="text" class="Form_Input" name="new_department_name" id="new_department_name" required>
                    <input type="hidden" name="department_status" id="department_status" value="Update">
                </div>
                <input class="btn btn-green" type="submit" value="Confirm">
            </form>
        </div>
    </div>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
