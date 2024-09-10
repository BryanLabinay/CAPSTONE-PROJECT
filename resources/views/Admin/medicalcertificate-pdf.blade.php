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
            <p class="doc-name">{{ $doctorName }}</p>
            <ul class="ul">
                <li class="li">{{ $position }}</li>
                <li class="li">{{ $district }}</li>
            </ul>
        </div>
    </footer>

    {{-- Content --}}
    <img src="Image/logo/mendoza.png" class="body-img">

    <h1 class="med-certif">MEDICAL CERTIFICATE</h1>
    {{-- {{ $date ?? 'NO' }} --}}
    <h5 class="date">{{ $date }}</h5>
    <p class="patient">This is to certify that <strong>{{ $patient_name }}</strong> from
        <strong>{{ $address }}</strong> was seen
        examined in this clinic.
    </p>

    <h3 class="phy-exam">PHYSICAL EXAMINATIONS:</h3>
    <ul>
        <li class="phy-li-1">Heart: {{ $heart ?? 'NO' }}</li>
        <li class="phy-li">Chest/Lung: {{ $lung ?? 'NO' }}</li>
        <li class="phy-li">HEENT: {{ $heent ?? 'NO' }}</li>
        <li class="phy-li">Abdomen: {{ $abdomen ?? 'NO' }}</li>
        <li class="phy-li">Extremeties: {{ $extremeties ?? 'NO' }}</li>
        <li class="phy-li">Integumentary: {{ $intergumentary ?? 'NO' }}</li>
    </ul>

    <h3 class="phy-exam">VITAL SIGNS:</h3>
    <ul>
        <li class="phy-li-1"><i>Blood Pressure (BP): {{ $bp ?? 'NO' }}</i></li>
        <li class="phy-li"><i>Cardiac Rate (CR): {{ $cr ?? 'NO' }}</i></li>
        <li class="phy-li"><i>Weight: {{ $weight ? $weight . ' KG' : 'NO' }}</i></li>
        <li class="phy-li"><i>Height: {{ !empty($height) ? $height . ' CM' : 'NO' }}</i></li>

    </ul>
    <h3 class="assessment"><i>ASSESSMENT: ESSENTIALLY NORMAL AT THE TIME OF EXAMINATION</i></h3>
    <h3 class="phy-exam">REMARKS/DIAGNOSIS: {{ $remarks }}</h3>
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
