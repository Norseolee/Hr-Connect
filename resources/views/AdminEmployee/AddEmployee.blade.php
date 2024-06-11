<!DOCTYPE html>
<html lang="en">

<head>
    @include("includes.Head")

    <link rel="stylesheet" href="{{ asset('css/AdminAddEmployee.css') }}">
    <title>HR Connect</title>
</head>

<body>
    <x-navbar-component  />
    <div class="greetings">
        <h1 class="Title_navbar" data-aos="zoom-in-right" data-aos-duration="100">ADD NEW EMPLOYEE</h1>

        <div class="button" data-aos="zoom-in-left" data-aos-duration="100">
            <a class="btn btn-brand ms-2" href="{{ route('Employee.index') }}" data-aos="zoom-in">BACK</a>
        </div>
    </div>

    <div class="List" data-aos="zoom-in" data-aos-duration="600">
        <div class="Form_Section">
            <div class="Form_Body">
                <form action="{{ route('Employee.store') }}" method="POST" enctype="multipart/form-data" class="form-group">
                    @csrf
                    <div class="Form_Body" id="section1">
                        <h4 class="Form_Title">PRIMARY INFORMATION</h4>
                        <div class="profile-picture">
                            <img id="image-preview">
                            <label for="picture" class="btn-brand">
                                Profile Picture
                            </label>
                            <input type="file" name="picture" id="picture" onchange="previewImage()" hidden>
                        </div>
                        <div class="Form_Input_Section_Column mt-2">
                            <label class="Form_Label" for="title">Title:</label>
                            <select class="Form_Input_Column" name="title" id="title">
                                <option value=""></option>
                                <option value="Mr">Mr.</option>
                                <option value="Mrs">Mrs.</option>
                                <option value="Ms">Ms.</option>
                            </select>
                        </div>
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="first_name">First Name:</label>
                            <input class="Form_Input_Column" type="text" name="first_name" id="first_name" value="">
                        </div>
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="last_name">Last Name:</label>
                            <input class="Form_Input_Column" type="text" name="last_name" id="last_name" value="">
                        </div>
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="middle_name">Middle Name:</label>
                            <input class="Form_Input_Column" type="text" name="middle_name" id="middle_name" value="">
                        </div>
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="maiden_name">Maiden Name:</label>
                            <input class="Form_Input_Column" type="text" name="maiden_name" id="maiden_name" value="">
                        </div>
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="nick_name">Nick Name:</label>
                            <input class="Form_Input_Column" type="text" name="nick_name" id="nick_name" value="">
                        </div>
                    </div>

                    <div class="Form_Body" id="section2" style="display: none">
                        <h4 class="Form_Title">PERSONAL INFORMATION</h4>
                        <!-- Date of Birth -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="date_of_birth">Date of Birth: </label>
                            <input class="Form_Input_Column" type="date" name="date_of_birth" id="date_of_birth" value="">
                        </div>
                        <!-- Place of Birth -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="place_of_birth">Place of Birth: </label>
                            <textarea class="Form_Input_Column" rows="5" cols="40" name="place_of_birth" style="resize: none;" id="place_of_birth" value=""></textarea>
                        </div>
                        <!-- Nationality -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="nationality">Nationality: </label>
                            <input class="Form_Input_Column" type="text" name="nationality" id="nationality" value="">
                        </div>
                        <!-- Civil Status -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="civil_status">Status: </label>
                            <select class="Form_Input_Column" name="civil_status" id="civil_status">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </div>
                        <!-- Gender -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="gender">Gender: </label>
                            <select class="Form_Input_Column" name="gender" id="gender">
                                <option value=""></option>
                                <option value="female">Female</option>
                                <option value="male">Male</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="Form_Body" id="section3" style="display: none">
                        <h4 class="Form_Title">CONTACT INFORMATION</h4>
                        <!-- mobile Number -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="mobile_no">Mobile No.:</label>
                            <input class="Form_Input_Column" type="text" name="mobile_no" value="">
                        </div>
                        <!-- email -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="email">Email:</label>
                            <input class="Form_Input_Column" type="email" name="email" id="email" value="">
                        </div>
                        <!-- Address -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label">Address</label>
                            <input class="Form_Input_Column" type="number" name="zip" id="zip" placeholder="Zip" value="">
                            <input class="Form_Input_Column" type="text" name="street" id="street" placeholder="Street" value="">
                            <input class="Form_Input_Column" type="text" name="city" id="city" placeholder="City" value="">
                            <input class="Form_Input_Column" type="text" name="province" id="province" placeholder="Province" value="">
                        </div>
                        <!-- Phone number -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="phone_no">Phone Number:</label>
                            <input class="Form_Input_Column" type="text" name="phone_no" id="phone_no" value="">
                        </div>
                    </div>

                    <div class="Form_Body" id="section4" style="display: none">
                        <h4 class="Form_Title">PERSON TO NOTIFY INCASE OF EMERGENCY</h4>
                        <!-- Name Contact -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="name">Name: </label>
                            <input class="Form_Input_Column" type="text" name="name" id="name" value="">
                        </div>
                        <!-- Relationship -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="relationship">Relationship: </label>
                            <input class="Form_Input_Column" type="text" name="relationship" id="relationship" value="">
                        </div>
                        <!-- Mobile number Contact -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="mobile_no_contact">Mobile No.: </label>
                            <input class="Form_Input_Column" type="text" name="mobile_no_contact" id="mobile_no_contact" value="">
                        </div>
                        <!-- Address contact -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="address_contact">Address: </label>
                            <input class="Form_Input_Column" type="text" name="address_contact" id="address_contact" value="">
                        </div>
                    </div>

                    <div class="Form_Body" id="section5" style="display: none">
                        <h4 class="Form_Title">CONTRIBUTIONS</h4>
                        <!-- sss -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="sss">SSS: </label>
                            <input class="Form_Input_Column" type="number" max="9999999999" title="Please enter a 10-digit SSS number" name="sss" id="sss" value="">
                        </div>
                        <!-- tin -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="tin">TIN: </label>
                            <input class="Form_Input_Column" type="number" max="999999999" title="Please enter a 9-digit TIN number" name="tin" id="tin" value="">
                        </div>
                        <!-- philhealth -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="philhealth">PhilHealth: </label>
                            <input class="Form_Input_Column" type="number" max="999999999999" title="Please enter a 12-digit PhilHealth number" name="philhealth" id="philhealth" value="">
                        </div>
                        <!-- hdmf -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="hdmf">HDMF: </label>
                            <input class="Form_Input_Column" type="number" max="999999999999" title="Please enter a 12-digit HDMF number" name="hdmf" id="hdmf" value="">
                        </div>
                    </div>

                    <div class="Form_Body" id="section6" style="display: none">
                        <h4 class="Form_Title">POSITION AND DEPARTMENT</h4>
                        <!-- position -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="position_id">Position:</label>
                            <select class="Form_Input" name="position_id" id="position_id">
                                <option value="">Select Position</option>
                                @foreach ($position as $pos)
                                <option value="{{ $pos->position_id }}">{{ $pos->position_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- department -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="department_id">Department:</label>
                            <select class="Form_Input_Column" name="department_id" id="department_id">
                                <option value="">Select Department</option>
                                @foreach ($department as $dept)
                                <option value="{{ $dept->department_id }}">{{ $dept->department_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Hire Date -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="hire_date">Hire Date:</label>
                            <input class="Form_Input_Column" type="date" name="hire_date" id="hire_date">
                        </div>
                        <!-- schedule -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="schedule_id">Schedule:</label>
                            <select class="Form_Input_Column" name="schedule_id" id="schedule_id">
                                <option value="">Select Schedule</option>
                                @foreach ($schedule as $sched)
                                <option value="{{ $sched->schedule_id }}">{{ $sched->start_time->format('H:i:s') }} - {{
                                    $sched->end_time->format('H:i:s') }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Salary -->
                        <div class="Form_Input_Section_Column">
                            <label class="Form_Label" for="salary">Salary:</label>
                            <input class="Form_Input_Column" type="number" name="salary" id="salary" min="5000">
                        </div>

                        <div class="Form_Body">
                            <button type="button" class="btn-brand" onclick="submitForm()">New Employee</button>
                        </div>
                    </div>
                </form>

                <div id="validation-message-container">
                    <p id="validation-message"></p>
                </div>

                <div class="Form_Input_Section_Column">
                    <button id="prevButton" class="btn-disabled btn-large" onclick="prevSection()">Previous</button>
                    <button id="nextButton" class="btn-brand btn-large" onclick="nextSection()">Next</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSection = 1;

        function submitForm() {
            const validationMessage = validateRequiredFields(6);

            if (validationMessage) {
                displayValidationMessage(validationMessage);
                return;
            }
            console.log("submitForm called");

            document.forms[0].submit();
        }

        function nextSection() {
            const validationMessage = validateRequiredFields(currentSection);

            if (validationMessage) {
                displayValidationMessage(validationMessage);
                return;
            }

            hideSection(currentSection);
            currentSection++;
            if (currentSection > 6 || currentSection === 6) {
                currentSection = 6;

                let nextButton = document.getElementById('nextButton');
                nextButton.classList.remove('btn-brand');
                nextButton.classList.add('btn-disabled');
            }

            let prevButton = document.getElementById('prevButton');
            prevButton.classList.remove('btn-disabled');
            prevButton.classList.add('btn-brand');

            displayValidationMessage('');
            showSection(currentSection);
        }

        function prevSection() {
            hideSection(currentSection);
            currentSection--;
            if (currentSection < 1 || currentSection === 1) {
                currentSection = 1;


                let prevButton = document.getElementById('prevButton');
                prevButton.classList.remove('btn-brand');
                prevButton.classList.add('btn-disabled');
            }
            let nextButton = document.getElementById('nextButton');
            nextButton.classList.remove('btn-disabled');
            nextButton.classList.add('btn-brand');

            displayValidationMessage('');
            showSection(currentSection);
        }

        function showSection(section) {
            document.getElementById('section' + section).style.display = 'block';
        }

        function hideSection(section) {
            document.getElementById('section' + section).style.display = 'none';
        }

        function validateRequiredFields(section) {
            const requiredFields = {
                1: ['title', 'first_name', 'last_name', 'nick_name']
                , 2: ['date_of_birth', 'gender', 'civil_status']
                , 3: ['mobile_no']
                , 6: ['position_id', 'department_id', 'hire_date', 'schedule_id', 'salary']
            , };

            const fields = requiredFields[section];

            if (fields) {
                for (const field of fields) {
                    const input = document.getElementById(field);
                    if (input && input.value.trim() === '') {
                        return `Please fill in ${field.replace('_', ' ',)}.`;
                    }
                }
            }

            return '';
        }

        function displayValidationMessage(message) {
            const validationMessageElement = document.getElementById('validation-message');
            const validationMessageContainer = document.getElementById('validation-message-container');

            if (validationMessageElement && validationMessageContainer) {
                validationMessageElement.innerText = message;
                validationMessageContainer.style.display = message ? 'block' : 'none';
            }
        }

        function previewImage() {
            var input = document.getElementById('picture');
            var preview = document.getElementById('image-preview');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                preview.src = '';
            }
        }

    </script>
</body>

</html>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();

</script>
