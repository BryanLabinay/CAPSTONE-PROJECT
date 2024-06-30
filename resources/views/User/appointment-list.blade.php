<x-app-layout>
    <section id="team" class="mt-2 team">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <h2 class="text-danger">Appointment List</h2>
                <p class="font-web">My Appointment</p>
            </header>
            <div class="d-flex justify-content-end">
                {{-- Delete --}}
                @if (session('delete'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 2500,
                            timerPr0ogressBar: true,
                        });
                        (async () => {
                            await Toast.fire({
                                icon: 'warning',
                                title: 'Appointment Deleted'
                            })
                        })()
                    </script>
                @endif
                {{-- Update --}}
                @if (session('update'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            iconColor: 'white',
                            customClass: {
                                popup: 'colored-toast',
                            },
                            showConfirmButton: false,
                            timer: 2500,
                            timerPr0ogressBar: true,
                        });
                        (async () => {
                            await Toast.fire({
                                icon: 'success',
                                title: 'Updated Appointment'
                            })
                        })()
                    </script>
                @endif
            </div>
            <div class="row gy-4 font-web container">
                <div class="col bg-primary-subtle p-4 rounded-4" data-aos="fade-up" data-aos-delay="100">
                    <table class="table table-striped mb-0 table-bordered">
                        <thead class="table-primary">
                            <tr class="text-center">
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                {{-- <th scope="col">Address</th> --}}
                                {{-- <th scope="col">Phone</th> --}}
                                <th scope="col">Date</th>
                                <th scope="col">Appointment</th>
                                {{-- <th scope="col">Message</th> --}}
                                <th scope="col">Status</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php
                                $perPage = $appointments->perPage();
                                $currentPage = $appointments->currentPage();
                                $counter = ($currentPage - 1) * $perPage + 1;
                            @endphp
                            @forelse ($appointments->sortByDesc('created_at') as $data)
                                <tr>
                                    <td>{{ $counter++ }}</td>
                                    <td class="fw-bold text-start">{{ $data->name }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($data->date)->format('F d, Y') }}</td>
                                    <td class="fw-bold">{{ $data->appointment }}</td>
                                    <td class="fw-bold"
                                        style="color: 
                                        @if ($data->status === 'Approved') green
                                        @elseif ($data->status === 'Cancelled')
                                            red
                                        @else
                                            grey @endif">
                                        {{ $data->status }}</td>
                                    <td>{{ $data->reason }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            {{-- View --}}
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $data->id }}">
                                                <i class="fa-solid fa-magnifying-glass fs-5 me-3 text-success"></i>
                                            </a>

                                            {{-- Edit --}}
                                            <a href="{{ route('Edit-Appointment', ['appointment_id' => $data->id]) }}"
                                                class="me-3"
                                                @if ($data->status === 'Approved') disabled
                                                    aria-disabled="true"
                                                    style="pointer-events: none; opacity: 0.3;"
                                                    @elseif ($data->status === 'Cancelled')
                                                    disabled
                                                    aria-disabled="true"
                                                    style="pointer-events: none; opacity: 0.3;" @endif>
                                                <i class="fa-solid fa-pen-to-square fs-5"></i>
                                            </a>

                                            {{-- reject --}}
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#newModal{{ $data->id }}">
                                                <button type="submit" class="btn text-danger p-0">
                                                    <i class="fa-solid fa-trash fs-5"></i>
                                                </button>
                                            </a>

                                            {{-- Delete --}}
                                            {{-- <form
                                                action="{{ route('delete.appointment', ['appointment_id' => $data->id]) }}"
                                                method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-danger p-0">
                                                    <i class="fa-solid fa-trash fs-5"></i>
                                                </button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal --}}
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-semibold " id="exampleModalLabel">Appointment
                                                    Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                {{-- Add your appointment details here --}}
                                                <p><b>Name:</b> {{ $data->name }}</p>
                                                <p><b>Address:</b> {{ $data->address }}</p>
                                                <p><b>Phone:</b> {{ $data->phone }}</p>
                                                <p><b>Date:</b>
                                                    {{ \Carbon\Carbon::parse($data->date)->format('F d, Y') }}</p>
                                                <p><b>Appointment:</b> {{ $data->appointment }}</p>
                                                <p><b>Message:</b> {{ $data->message }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="9">
                                        <div class="h5 text-center alert alert-primary">
                                            No Appointment
                                        </div>
                                    </td>
                                </tr>
                            @endforelse


                            {{-- modal for delete --}}
                            @foreach ($appointments as $data)
                                <div class="modal fade" id="newModal{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="newModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-semibold text-danger" id="newModalLabel">
                                                    Delete
                                                    Appointment</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Are you sure you want to delete this Appointment</h4>

                                            </div>
                                            <div class="modal-footer">

                                                <form
                                                    action="{{ route('delete.appointment', ['appointment_id' => $data->id]) }}"
                                                    method="post" class="">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger text-danger text-light fw-semibold py-1">
                                                        Delete
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary py-1"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                </div>
                @endforeach
                </tbody>

                </table>
                <div>
                    {{ $appointments->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        </div>
    </section>
</x-app-layout>
