<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Record PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="row gy-4 font-web">
        <div class="col bg-primary-subtle p-4 rounded-4" data-aos="fade-up" data-aos-delay="100">
            <h3>Approved Appointment Record</h3>
            <table class="table table-striped mb-0 table-bordered">
                <thead class="table-danger">
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Appointment</th>
                        {{-- <th scope="col">Message</th> --}}
                        <th scope="col">Status</th>
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
        </div>
    </div>
</body>

</html>
