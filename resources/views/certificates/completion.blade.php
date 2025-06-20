<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; }
        .title { font-size: 32px; margin-bottom: 30px; }
        .cert { font-size: 18px; }
    </style>
</head>
<body>
    <div class="title">Certificate of Completion</div>
    <p class="cert">
        This is to certify that <strong>{{ $internship->intern->name }}</strong> has successfully completed the internship
        in <strong>{{ $internship->department }}</strong> from <strong>{{ $internship->start_date }}</strong> to <strong>{{ $internship->end_date }}</strong>.
    </p>
</body>
</html>

