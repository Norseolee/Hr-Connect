<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")
    <title>HR Connect | Organization</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">ORAGANIZATION</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Admin/Organization/Position/create">ADD POSITION</a>
            <a class="btn btn-brand" href="/Admin/Organization/Department/create">ADD DEPARTMENT</a>
        </div>
    </div>

    <div class="List_Column">
        <div data-aos="zoom-in-up" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th class="table_title" colspan="3">Position List</th>
                    </tr>
                    <tr>
                        <th>Position ID</th>
                        <th>Name</th>
                        <th>No of Employees</th>
                        <th></th>
                        <th></th>
                    </tr>


                </thead>
                @if (count($positionlist) > 0)
                <tbody class="body_section">
                    @foreach ($positionlist as $position)
                    <tr>
                        <td>{{ $position->position_id }}</td>
                        <td>{{$position->position_name}}</td>
                        <td>{{$position->employees()->count()}}</td>
                        <td></td>

                        <td><a class="btn btn-brand btn-large" href="/Admin/Organization/Position/{{$position->position_id}}">Information</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @else
            <p>No Data</p>
            @endif
        </div>
        <div data-aos="zoom-in-down" data-aos-duration="600">
            <table>
                <thead class="thead_section">
                    <tr>
                        <th colspan="3" class="table_title">Department List</th>
                    </tr>
                    <tr>
                        <th>Department ID</th>
                        <th>Department Name</th>
                        <th>No of Employees</th>
                        <th>No of Positions</th>
                        <th></th>
                    </tr>

                </thead>
                @if (count($departmentlist) > 0)
                <tbody class="body_section">
                    @foreach ($departmentlist as $dl)
                    <tr>
                        <td>{{$dl->department_id}}</td>
                        <td>{{$dl->department_name}}</td>
                        <td>{{ $dl->employees()->count() }}</td>
                        <td>{{ $dl->positions()->count() }}</td>
                        <td><a class="btn btn-brand btn-large" href="/Admin/Organization/Department/{{$dl->department_id}}">Information</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>No Data</p>
            @endif
        </div>
    </div>

</body>

</html>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
