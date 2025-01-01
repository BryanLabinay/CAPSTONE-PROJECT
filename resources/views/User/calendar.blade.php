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

        /* Pastel color for booked appointments */
        .fc-event.fc-event-month {
            background-color: #ff9f89 !important;
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

        /* Message for fully booked dates */
        .fc-day.fc-booked {
            background-color: #f4cccc; /* Light red background for fully booked dates */
            color: white;
            position: relative;
        }

        .fc-day.fc-booked:after {
            content: "Full";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 14px;
            font-weight: bold;
            color: #ff5c5c;
        }
    </style>

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

                    // Check if the date is fully booked (add class for fully booked days)
                    const bookedDates = @json($fullyBookedDates); // Get fully booked dates from PHP
                    if (bookedDates.includes(date.format('YYYY-MM-DD'))) {
                        cell.addClass('fc-booked'); // Add class for fully booked dates
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
                    }
                },
            });
        });
    </script>
</x-app-layout>
