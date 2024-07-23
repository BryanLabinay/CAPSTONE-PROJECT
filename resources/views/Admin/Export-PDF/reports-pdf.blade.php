<!DOCTYPE html>
<html>

<head>
    <title>Appointments Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1,
        h2 {
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>Appointments Report</h1>

    <h2>Status Counts</h2>
    <ul>
        <li>Pending: {{ $statusCounts['Pending'] }}</li>
        <li>Approved: {{ $statusCounts['Approved'] }}</li>
        <li>Cancelled: {{ $statusCounts['Cancelled'] }}</li>
    </ul>

    <h2>Appointment Status Counts</h2>
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
