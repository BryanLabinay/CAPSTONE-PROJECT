<!DOCTYPE html>
<html>

<head>
    <title>Medical Certificate</title>
</head>

<body>
    <h1>Medical Certificate</h1>
    <p>This is to certify that <strong>{{ $patient_name }}</strong> has been examined and treated at our facility.</p>

    <h2>Medical Information</h2>
    <ul>
        <li><strong>Heart:</strong> {{ $heart }}</li>
        <li><strong>Lung:</strong> {{ $lung }}</li>
        <li><strong>HEENT:</strong> {{ $heent }}</li>
        <li><strong>Abdomen:</strong> {{ $abdomen }}</li>
        <li><strong>Extremeties:</strong> {{ $extremeties }}</li>
        <li><strong>Integumentary:</strong> {{ $intergumentary }}</li>
    </ul>

    <h2>Vital Signs</h2>
    <ul>
        <li><strong>Blood Pressure (BP):</strong> {{ $bp }}</li>
        <li><strong>Cardiac Rate (CR):</strong> {{ $cr }}</li>
        <li><strong>Weight:</strong> {{ $weight }}</li>
        <li><strong>Height:</strong> {{ $height }}</li>
    </ul>
</body>

</html>
