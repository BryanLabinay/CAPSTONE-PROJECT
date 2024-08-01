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
    {{-- Header --}}
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

    {{-- Footer --}}
    <footer>
        <div class="doc-title">
            <p class="doc-name">Dr. Mark Bryan Labinay</p>
            <ul class="ul">
                <li class="li">MEDICAL OFFICER III</li>
                <li class="li">APARRI PROVINCIAL HOSPITAL</li>
            </ul>
        </div>
    </footer>

    {{-- Content --}}
    <img src="Image/logo/mendoza.png" class="body-img">

    <h1 class="med-certif">MEDICAL CERTIFICATE</h1>
    {{-- {{ $date ?? 'NO' }} --}}
    <h5 class="date">August 01, 2024</h5>
    <p class="patient">This is to certify that <strong>{{ $patient_name }}</strong> from
        <strong>{{ $address }}</strong> was seen
        examined in this clinic.
    </p>

    <h3 class="phy-exam">PHYSICAL EXAMINATIONS:</h3>
    <ul>
        <li>Heart: {{ $heart ?? 'NO' }}</li>
        <li>Chest/Lung: {{ $lung ?? 'NO' }}</li>
        <li>HEENT: {{ $heent ?? 'NO' }}</li>
        <li>Abdomen: {{ $abdomen ?? 'NO' }}</li>
        <li>Extremeties: {{ $extremeties ?? 'NO' }}</li>
        <li>Integumentary: {{ $intergumentary ?? 'NO' }}</li>
    </ul>

    <h3 class="phy-exam">VITAL SIGNS:</h3>
    <ul>
        <li><i>Blood Pressure (BP): {{ $bp ?? 'NO' }}mmHg</i></li>
        <li><i>Cardiac Rate (CR): {{ $cr ?? 'NO' }}</i></li>
        <li><i>Weight: {{ $weight ?? 'NO' }}KG</i></li>
        <li><i>Height: {{ $height ?? 'NO' }}CM </i></li>
    </ul>
    <h3 class="assessment"><i>ASSESSMENT: ESSENTIALLY NORMAL AT THE TIME OF EXAMINATION</i></h3>
    <h3 class="phy-exam">REMARKS/DIAGNOSIS: FIT TO WORK CLASS A</h3>
    <ul>
        <li>CLASS A: Physically fit for all types of work. No physical defects or disease noted</li>
        <li>CLASS B: Physically fit for all types of work. Has minor defect/ailment.</li>
        <li>CLASS C: Employable but owing to certain impairments or conditions. Recommending follow up/evaluation. </li>
    </ul>

    <h4><i>Note: Please see attached files</i></h4>
    <p>This is Issued Upon His/Her Request For Job Employment Purposes.</p>
    <p class="title"></p>
    </div>
</body>

</html>
