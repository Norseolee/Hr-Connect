<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">{{$position->position_name}}</h1>

        <div class="button">
            <a class="btn btn-brand" data-aos="zoom-in-left" data-aos-duration="100" href="/Admin/Organization/Position/{{$position->position_id}}">Back</a>
        </div>
    </div>

    <div class="Form_Section" data-aos="zoom-in-up" data-aos-duration="600">
        <form action="/Admin/Organization/Position/{{$position->position_id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="Form_Body">
                <label class="Form_Title" for="position_name" class="current_name">Current Name: <span class="Form_Title_Content">{{$position->position_name}}</span></label>
                <div class="Form_Input_Section">
                    <label for="new_position_name" class="Form_Label">New Name: </label>
                    <input class="Form_Input" type="text" name="new_position_name" id="new_position_name" required>
                    <input type="hidden" name="position_status" id="position_status" value="Update">
                </div>
                <div class="Form_Input_Section">
                    <label for="department_id" class="Form_Label">Department (Do not change if not needed): </label>
                    <select class="Form_Input" name="department_id" id="department_id" required>

                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->department_id }}" @if($department->department_id == $position->department_id) selected @endif>
                            {{ $department->department_name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <input class="btn btn-green" type="submit" value="Confirm">
            </div>
        </form>
    </div>


</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
