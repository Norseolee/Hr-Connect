<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.Head')
    <title>Hr Connect | Audit Log</title>
</head>
<body>
    <x-navbar-component />

    <div>
        <table>
            <thead class="thead_section">
                <tr>
                    <th>ID</th>
                    <th>Action</th>
                    <th>Triggered by</th>
                    <th>Auditable type</th>
                    <th>Auditable id</th>
                    {{-- <th>Old Values</th>
                    <th>New Values</th>
                    <th>Additional Details</th> --}}
                    <th>Updated at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="body_section">
                @forelse ($auditlogs as $al)
                <tr>
                    <td>{{ $al->id }}</td>
                    <td>{{ $al->action }}</td>
                    <td>{{ $al->user->username }}</td>
                    <td>{{ $al->auditable_type ? $al->auditable_type:'NULL' }}</td>
                    <td>{{ $al->auditable_id ? $al->auditable_id:'NULL'}}</td>
                    {{-- <td>{{ $al->old_values ? $al->old_values:'NULL'}}</td>
                    <td>{{ $al->new_values ? $al->new_values:'NULL'}}</td>
                    <td>{{ $al->additional_details ? $al->additional_details:'NULL' }}</td> --}}
                    <td>{{ $al->updated_at }}</td> <!-- Fixed typo here -->
                    <td><button>View Info</button></td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">No audit logs found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
