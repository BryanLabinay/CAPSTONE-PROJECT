<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="Css/reports.css">
    <title>Appointments Report</title>
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
        <p class="title">APPOINTMENTS REPORT</p>
    </header>
    <ul>
        <li>Pending: {{ $statusCounts['Pending'] }}</li>
        <li>Approved: {{ $statusCounts['Approved'] }}</li>
        <li>Cancelled: {{ $statusCounts['Cancelled'] }}</li>
    </ul>

    <p class="title-2">APPOINTMENT STATUS COUNTS</p>
    <img src="Image/logo/mendoza.png" class="body-img">
    <table>
        <thead>
            <tr>
                <th>Appointment</th>
                <th>Status</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointmentStatusCounts as $appointment => $statuses)
                @foreach ($statuses as $count)
                    <tr>
                        <td>{{ $appointment }}</td>
                        <td>{{ $count->status }}</td>
                        <td>{{ $count->total }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>
