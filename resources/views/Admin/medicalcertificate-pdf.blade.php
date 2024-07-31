<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DR.MENDOZA MEDICAL CERTIFICATE</title>
    <link rel="shortcut icon" href="Image/logo/mendoza.png" type="image/x-icon">
    <link rel="stylesheet" href="Css/med-certif.css">
</head>

<body>
    <header>
        <div class="img">
            <img src="Image/logo/mendoza.png">
        </div>
        <h2>DR. MENDOZA MULTI-SPECIALIST CLINIC</h2>
        <p class="address">
            Magsaysay Corner St. Minanga Aparri Cagayan <br>
            CEL# 0917 574 4643
        </p>
        <p class="title"></p>
    </header>
    <footer>
        <div class="div2">Footer Content Here</div>
        <div>Page <span class="pagenum"></span></div>
    </footer>


    <h1 class="med-certif">MEDICAL CERTIFICATE</h1>

    <p class="patient">This is to certify that <strong>{{ $patient_name }}</strong> from
        <strong>{{ $address }}</strong> has been
        examined and treated at our facility.
    </p>

    <h2>Medical Information</h2>
    <ul>
        <li><strong>Heart:</strong> {{ $heart ?? 'NO' }}</li>
        <li><strong>Lung:</strong> {{ $lung ?? 'NO' }}</li>
        <li><strong>HEENT:</strong> {{ $heent ?? 'NO' }}</li>
        <li><strong>Abdomen:</strong> {{ $abdomen ?? 'NO' }}</li>
        <li><strong>Extremeties:</strong> {{ $extremeties ?? 'NO' }}</li>
        <li><strong>Integumentary:</strong> {{ $intergumentary ?? 'NO' }}</li>
    </ul>

    <h2>Vital Signs</h2>
    <ul>

        <li><strong>Blood Pressure (BP):</strong> {{ $bp ?? 'NO' }}</li>
        <li><strong>Cardiac Rate (CR):</strong> {{ $cr ?? 'NO' }}</li>
        <li><strong>Weight:</strong> {{ $weight ?? 'NO' }}</li>
        <li><strong>Height:</strong> {{ $height ?? 'NO' }}</li>
        <li><strong>Date:</strong> {{ $date ?? 'NO' }}</li>
    </ul>
</body>

</html>
