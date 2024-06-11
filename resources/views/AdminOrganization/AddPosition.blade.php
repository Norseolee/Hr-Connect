<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminAddPosition.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">ADD NEW POSITION</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Organization">Back</a>
        </div>
    </div>




    <div class="Form_Section mx-5" data-aos="zoom-in-up" data-aos-duration="800">
        <div class="Form_Body">
            <form action="{{ route('Position.store') }}" method="POST">
                @csrf
                <div class="Form_Input_Section">
                    <label class="Form_Label" for="position_name">Position Name</label>
                    <input class="Form_Input" type="text" name="position_name" id="position_name" required>
                    <input type="hidden" name="position_status" value="Added">
                </div>
                <div class="Form_Input_Section">
                    <label class="Form_Label" for="department_id">Department</label>
                    <select class="Form_Input" name="department_id" id="department_id" required>
                        <option value="0">Select Department</option>
                        @foreach ($department as $d)
                        <option value="{{ $d->department_id }}">{{ $d->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="btn btn-green" value="New Position" />
            </form>
        </div>
    </div>

</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
