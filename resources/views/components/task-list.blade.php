
<div class="table-responsive">
 <table class="table" id="pc-dt-simple">
    <thead>
        <tr>
            <th>Title</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Deadline</th>
            <th>Attachment</th>
            <th>Progress</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
        <tr>
            <td>{{ $task->title }}</td>
            <td>{{ $task->priority }}</td>
            <td>@include('components.status-badge', ['status' => $task->status])</td>
            <td>{{ $task->deadline ?? 'N/A' }}</td>
            <td><a href="{{ asset('storage/' . $task->attachment) }}" download>Download attachment</a></td>
            <td>
                <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: {{ $task->completion_percentage ?? 0 }}%">
                        {{ $task->completion_percentage ?? 0 }}%
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
