</html>
<!DOCTYPE html>
<html>

<head>
    <title>Appointment Record PDF</title>

    <link rel="shortcut icon" href="IMG/csulogo.png" type="image/x-icon">
    <style>
        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        p {
            text-align: center;
            margin-top: 0px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            /* margin-top: 20px; */
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            font-size: 15px;
            /* font-weight: 600; */
        }

        thead {
            background-color: #f2f2f2;


        }

        .title {
            background-color: #131842;
            width: 100%;
            color: #ffffff
                /* padding: 4px 0; */
        }

        .div1,
        .div2 {
            border-top: 1px solid black;
            padding: 0;
        }

        @page {
            margin: 150px 25px;
        }

        header {
            position: fixed;
            top: -160px;
            left: 0px;
            right: 0px;
            height: 100px;
            text-align: center;
            background-color: white;
            padding: 10px 0;
        }

        footer {
            position: fixed;
            bottom: -100px;
            left: 0px;
            right: 0px;
            height: 50px;
            text-align: center;
            background-color: white;
            padding: 10px 0;
        }

        .pagenum:before {
            content: counter(page);
        }

        .small-table td {
            font-size: 12px;
            padding: 5px;
        }

        .img {
            margin-top: 10px;
            width: 60px;
            position: absolute;
        }

        img {
            position: absolute;
            width: 100%;
            top: 0px;
            left: 65px;
        }

        h1 {
            padding: 0;
        }
    </style>

</head>

<body>
    <header>
        <div class="img">
            <img src="Image/logo/mendoza.png">
        </div>
        <h2>DR. MENDOZA MULTI-SPECIALIST CLINIC</h2>
        <p>
            Magsaysay Corner St. Minanga Aparri Cagayan
        </p>
        <p class="title">APPROVED PATIENTS APPOINTMENT RECORDS</p>
        {{-- <p>ATTENDANCE FOR STUDENTS LOG SHEET</p> --}}
    </header>
    <footer>
        <div class="div2">Footer Content Here</div>
        <div>Page <span class="pagenum"></span></div>
    </footer>
    <main>
        <table class="small-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Appointment</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $index => $data)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->address }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ \Carbon\Carbon::parse($data->date)->format('F d, Y') }}</td>
                        <td>{{ $data->appointment }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>

</html>
