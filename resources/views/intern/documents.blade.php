<h3>Document Upload</h3>
<form method="POST" action="{{ route('intern.upload') }}" enctype="multipart/form-data">
    @csrf
            <label>Type</label>
            <select name="type" required>
                <option value="Aadhar">Aadhar</option>
                <option value="Resume">Resume</option>
                <option value="Certificate">Certificate</option>
                <option value="Photo">Photo</option>
                <option value="Bank Passbook">Bank Passbook</option>
            </select>
    <input type="file" name="document" accept=".pdf,.docx" required />
    <button class="btn btn-primary">Upload</button>
</form>
@if(session('success'))<p class="text-success">{{ session('success') }}</p>@endif