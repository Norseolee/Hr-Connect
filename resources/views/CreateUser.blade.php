<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.Head')
    <link rel="stylesheet" href="{{ asset('css/AdminCreateUser.css') }}">
    <title>HR Connect | Create User</title>
</head>

<body>
    @include("Layout.Messege")
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">{{ $employee->first_name }} {{ $employee->last_name }}</h1>
    </div>



    <div class="Form_Section" data-aos="zoom-in" data-aos-duration="600">
        <div class="Form_Body">
            <form action="/Admin/Employee/{{ $employee->employee_id }}/CreateUser" method="POST">
                @csrf
                <div class="Form_Input_Section_Column">

                    <label class="Form_Label" for="role">Select Role:</label>
                    <select class="Form_Input" name="role" id="role" required>
                        <option value="">Select Role</option>
                        @foreach ($role as $r)
                        <option value="{{$r->role_id}}">{{$r->role_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="Form_Input_Section_Column">
                    <label class="Form_Label" for="username">User Name </label>
                    <input class="Form_Input" type="text" name="username" id="username" required>
                    <label class="Form_Label" for="password">Password: </label>
                    <input class="Form_Input" type="password" name="password" id="password" required>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-green" value="Create User">
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>

</html>
