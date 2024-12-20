<x-app-layout>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <style>
        #calendar {
            max-width: 750px;
            margin: 0 auto;
            margin-top: 5em;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Custom background for events */
        .fc-event {
            border-radius: 5px;
            font-size: 14px;
        }

        .fc-event.fc-event-month {
            background-color: #ff9f89 !important;
            /* Pastel color for booked appointments */
        }

        /* Hover effect on events */
        .fc-event:hover {
            background-color: #ff5c5c;
            cursor: pointer;
        }

        /* Add some padding to the day grid for better readability */
        .fc-day-number {
            padding: 5px;
            font-size: 16px;
        }
    </style>

    {{-- <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #calendar {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>

    <section id="team" class="team">
        <div class="container mt-2" data-aos="fade-up">
            <h2 class="text-center fw-bold" style="color:#012970">Clinic Appointment Calendar</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

    </section>
    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                editable: true,

                events: 'CALENDAR/appointments', // Fetch events from the backend

                select: function(start, end) {
                    var title = prompt('Enter Appointment Title:');
                    if (title) {
                        var eventData = {
                            title: title,
                            start: start.format(),
                            end: end.format()
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true);
                    }
                    $('#calendar').fullCalendar('unselect');
                },
                eventClick: function(event) {
                    var deleteMsg = confirm('Do you really want to delete this appointment?');
                    if (deleteMsg) {
                        $('#calendar').fullCalendar('removeEvents', event._id);
                    }
                }
            });
        });
    </script> --}}
    <div class="container">
        <div id="calendar"></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay',
                },
                defaultView: 'month',
                editable: false,
                events: [
                    // Loop through appointments and add them as events
                    @foreach ($appointments as $appointment)
                        {
                            title: '{{ $appointment->appointment }}', // Appointment title
                            start: '{{ $appointment->date }}', // Appointment date
                            color: '#074799', // Background color for the appointment
                            url: '/Appointment-List/{{ $appointment->id }}', // Link to the appointment details
                        },
                    @endforeach

                    // Loop through events and add them as events
                    @foreach ($events as $event)
                        {
                            title: '{{ $event->title }}', // Event title
                            start: '{{ $event->date }}', // Event start date
                            color: '#ff5733', // Background color for the event
                            url: '/Events/{{ $event->id }}', // Link to the event details
                        },
                    @endforeach
                ],
                dayRender: function(date, cell) {
                    // Highlight the active day with a background color
                    const today = moment().format('YYYY-MM-DD');
                    if (date.format('YYYY-MM-DD') === today) {
                        cell.css('background-color', '#FFF574'); // Highlight current day
                    }
                },
                eventRender: function(event, element) {
                    // Add tooltip for event
                    element.attr('title', `Appointment: ${event.title}`);
                    element.tooltip({
                        placement: 'top',
                        trigger: 'hover',
                    });

                    // Make the event clickable
                    if (event.url) {
                        element.attr('href', event.url);
                        // element.attr('target'); // Open in a new tab (optional)
                    }
                },
            });
        });
    </script>










</x-app-layout>
