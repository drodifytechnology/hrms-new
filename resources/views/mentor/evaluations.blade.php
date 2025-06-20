<h2>Intern Evaluations</h2>
@if(session('success'))<p class="text-success">{{ session('success') }}</p>@endif
@foreach($internships as $internship)
    <form method="POST" action="{{ route('mentor.evaluations.submit') }}">
        @csrf
        <p><strong>{{ $internship->intern->name }}</strong> ({{ $internship->internship_id }})</p>
        <input type="hidden" name="internship_id" value="{{ $internship->id }}">
        <input type="number" name="score" min="0" max="100" required>
        <textarea name="feedback" required></textarea>
        <button type="submit">Submit Evaluation</button>
    </form>
@endforeach