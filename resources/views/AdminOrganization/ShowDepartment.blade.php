<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/AdminShowDepartment.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">{{$department->department_name}}</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Organization">BACK</a>
            <a class="btn btn-brand" href="/Admin/Organization/Department/{{$department->department_id}}/edit" class="btn btn-primary">EDIT</a></td>
            <a class="btn btn-red" data-bs-toggle='modal' data-bs-target='#delete_{{$department->department_id}}'>DELETE</a>
            </td>
        </div>
    </div>

    <div class="modal fade" id="delete_{{$department->department_id}}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm deletion of Department
                        {{$department->department_name}}
                    </h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this Department?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <form action="/Admin/Organization/Department/{{$department->department_id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="zoom-in-up" data-aos-duration="600">
        <form class="Search_Bar" action="">
            <input class="Search_Input" type="text" name="search" value="{{ request('tag') ?? request('search') }}">
            <div class="Search_Button">
                <button class="btn-brand" type="submit">Search</button>
                <a href="{{ url('/Admin/Organization/Department/' . $department->department_id) }}" class="btn-grey ">Clear</a>
            </div>
        </form>
    </div>

    <div class="List">
        <div class="One_List" data-aos="zoom-in-right" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <th>ID</th>
                    <th>Position</th>
                </thead>
                <tbody class="body_section">
                    @foreach ($position as $pos)
                    <tr>

                        <td>{{$pos->position_id}}</td>
                        <td><a href="?tag={{ $pos->position_name }}">{{$pos->position_name}} </a></td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="Two_List" data-aos="zoom-in-left" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Position</th>
                </thead>
                <tbody class="body_section">
                    @foreach ($employee as $emp)
                    <tr>
                        <td>{{$emp->employee_id}}</td>
                        <td>{{$emp->first_name}} {{$emp->last_name}}</td>
                        <td>{{$emp->position_name}}</td>
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
