<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")


    <link rel="stylesheet" href="{{ asset('css/AdminShowPosition.css')}}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />

    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">{{$position->position_name}}</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Organization">BACK</a>
            <a class="btn btn-green" href="/Admin/Organization/Position/{{$position->position_id}}/edit">EDIT</a>
            <a class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$position -> position_id}}'>DELETE</a>
        </div>
    </div>


    <div class=" modal fade" id="delete_{{$position -> position_id}}" tabindex="-1" data-aos="zoom-in">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampositioneModalLabel">Confirm deletion of Position {{$position->
                        position_name}}</h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Position?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-grey" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form action="/Admin/Organization/Position/{{$position->position_id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" style="margin-top: 3px;" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div data-aos="zoom-in" data-aos-duration="600">
        <form class="Search_Bar" action="">
            <input class="Search_Input" type="text" name="search" value="{{ request('search') }}">
            <div class="Search_Button">
                <button class="btn-brand" type="submit">Search</button>
                <a href="{{ url('/Admin/Organization/Position/' . $position->position_id) }}" class="btn-grey ">Clear</a>
            </div>
        </form>
    </div>


    <div class="List">
        <div class="One_List" data-aos="zoom-in-up" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Department</th>
                </thead>
                <tbody class="body_section">
                    @foreach ($employee as $emp)
                    <tr>
                        <td>{{$emp->employee_id}}</td>
                        <td>{{$emp->first_name}} {{$emp->last_name}}</td>
                        @foreach ($department as $dept)
                        <td>{{$dept->department_name}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>


</html>

<script src=" https://unpkg.com/aos@next/dist/aos.js">
</script>
<script>
    AOS.init();

</script>
