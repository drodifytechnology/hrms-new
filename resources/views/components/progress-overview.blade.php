
@if(count($internships??[]) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Intern</th>
                <th>Completed Tasks</th>
                <th>Total Tasks</th>
                <th>Progress</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($internships as $internship)
                @php
                    $total = $internship->tasks->count();
                    $done = $internship->tasks->where('status', 'Completed')->count();
                    $percentage = $total > 0 ? round(($done / $total) * 100) : 0;
                @endphp
                <tr>
                    <td>{{ $internship->intern->name }}</td>
                    <td>{{ $done }}</td>
                    <td>{{ $total }}</td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: {{ $percentage }}%">{{ $percentage }}%</div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No interns assigned.</p>     
@endif
