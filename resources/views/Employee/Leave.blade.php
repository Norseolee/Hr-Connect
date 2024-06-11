<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/Leave.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">LEAVE</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand" href="/Leave/create">REQUEST LEAVE</a>
        </div>
    </div>

    <div class="List" data-aos="zoom-in" data-aos-duration="600">
        <div class="One_List">
            <table>
                <thead class="thead_section">
                    <th>leave ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>status</th>
                </thead>
                <tbody class="body_section">
                    @forelse ($leave as $l)
                    <tr>
                        <td>{{$l->leave_id}}</td>
                        <td>{{$l->start_date}}</td>
                        <td>{{$l->end_date}}</td>
                        <td>{{$l->status}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td>No Leave Information</td>
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
