<div class="One_List" data-aos="zoom-in" data-aos-duration="600">
    <table>
        <thead class="thead_section">
            <tr class="table_title">
                <th colspan="3">{{ $title }}</th>
            </tr>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Log Time</th>
            </tr>
        </thead>
        <tbody class="body_section">
            @forelse ($attendance as $a)
            <tr>
                <td>{{ $a->employee_id }}</td>
                @foreach ($employee as $e)
                @if ($e->employee_id === $a->employee_id)
                <td>{{ $e->first_name }} {{ $e->last_name }}</td>
                @endif
                @endforeach
                <td>{{ $a->$timeKey ? $a->$timeKey->format('H:i') : '' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">No records found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
