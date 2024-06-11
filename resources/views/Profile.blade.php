<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    @include('Layout.Button')
    <style>
        body {
            user-select: none;
        }

        .profile-picture {
            height: 300px;

        }

        .section {
            margin-bottom: 20px;
            border: 1px solid rgba(146, 53, 232, 1);
            padding: 50px;
            border-radius: 10px;
        }

        .section-title {
            font-weight: bold;
            color: rgba(146, 53, 232, 1);
            margin-bottom: 10px;
        }

        .section-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .card-body {
            background-color: rgba(241, 243, 245, 1);

        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: rgba(59, 16, 134, 1);
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="tel"],
        .form-group input[type="email"],
        .form-group input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(41, 10, 111, 1);
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .form-group textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid rgba(41, 10, 111, 1);
            border-radius: 5px;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: white;
        }

    </style>
    <title>HR Connect | Profile</title>
</head>

<body>
    @include("Layout.NavBarEmployee")
    <h1 class="Title_navbar" data-aos="zoom-in">My Profile</h1>


    <div class="container" data-aos="zoom-in">
        <div class="profile-picture">
            <img src="/img/user_profiles/{{$employee->picture}}" alt="Profile Picture" width="300px">
        </div>

        <!-- Personal Information -->
        <div class="section">
            <h2 class="section-title">Personal Information</h2>
            <div class="section-content">
                <div class="form-group">
                    <label>Employee ID:</label>
                    <input disabled value="{{$employee->employee_id}}" type="text">
                </div>
                <div class="form-group">
                    <label>Title:</label>
                    <input disabled value="{{$employee->title}}" type="text">
                </div>
                <div class="form-group">
                    <label>First Name:</label>
                    <input disabled value="{{$employee->first_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input disabled value="{{$employee->last_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Middle Name:</label>
                    <input disabled value="{{$employee->middle_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Maiden Name:</label>
                    <input disabled value="{{$employee->maiden_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Nick Name:</label>
                    <input disabled value="{{$employee->nick_name}}" type="text">
                </div>
            </div>
        </div>

        <!-- Department and Position -->
        <div class="section">
            <h2 class="section-title">Department and Position</h2>
            <div class="section-content">
                <div class="form-group">
                    <label>Department:</label>
                    <input disabled value="{{$department->department_name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Position:</label>
                    <input disabled value="{{$position->position_name}}" type="text">
                </div>
            </div>
        </div>

        <!-- Date of Birth, Nationality, Status, Gender -->
        <div class="section">
            <h2 class="section-title">Personal Information</h2>
            <div class="section-content">
                <div class="form-group">
                    <label>Date of Birth:</label>
                    <input disabled value="{{$employeeinfo->date_of_birth}}" type="text">
                </div>
                <div class="form-group">
                    <label>Place of Birth:</label>
                    <input disabled value="{{$employeeinfo->place_of_birth}}" type="text">
                </div>
                <div class="form-group">
                    <label>Nationality:</label>
                    <input disabled value="{{$employeeinfo->nationality}}" type="text">
                </div>
                <div class="form-group">
                    <label>Status:</label>
                    <input disabled value="{{$employeeinfo->status}}" type="text">
                </div>
                <div class="form-group">
                    <label>Gender:</label>
                    <input disabled value="{{$employeeinfo->gender}}" type="text">
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="section">
            <h2 class="section-title">Contact Information</h2>
            <div class="section-content">
                <div class="form-group">
                    <label>Mobile No:</label>
                    <input disabled value="{{$employeeinfo->mobile_no}}" type="text">
                </div>
                <div class="form-group">
                    <label>Phone No:</label>
                    <input disabled value="{{$employeeinfo->phone_no}}" type="text">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input disabled value="{{$employeeinfo->email_address}}" type="text">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input disabled value="{{$employeeinfo->zip}}" type="text">
                    <input disabled value="{{$employeeinfo->city}}" type="text">
                    <input disabled value="{{$employeeinfo->street}}" type="text">
                    <input disabled value="{{$employeeinfo->province}}" type="text">
                </div>
            </div>
        </div>

        <!-- Emergency Contact Information -->
        <div class="section">
            <h2 class="section-title">Emergency Contact Information</h2>
            <div class="section-content">
                <div class="form-group">
                    <label>Name:</label>
                    <input disabled value="{{$employeenotify->name}}" type="text">
                </div>
                <div class="form-group">
                    <label>Relationship:</label>
                    <input disabled value="{{$employeenotify->relationship}}" type="text">
                </div>
                <div class="form-group">
                    <label>Mobile No:</label>
                    <input disabled value="{{$employeenotify->mobile_no}}" type="text">
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input disabled value="{{$employeenotify->address}}" type="text">
                </div>
            </div>
        </div>

        <!-- Contributions -->
        <div class="section">
            <h2 class="section-title">Contributions</h2>
            <div class="section-content">
                <div class="form-group">
                    <label>SSS:</label>
                    <input disabled value="{{$employee_doc->sss}}" type="text">
                </div>
                <div class="form-group">
                    <label>TIN:</label>
                    <input disabled value="{{$employee_doc->tin}}" type="text">
                </div>
                <div class="form-group">
                    <label>PhilHealth:</label>
                    <input disabled value="{{$employee_doc->philhealth}}" type="text">
                </div>
                <div class="form-group">
                    <label>HDMF:</label>
                    <input disabled value="{{$employee_doc->hdmf}}" type="text">
                </div>
            </div>
        </div>

    </div>


</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
