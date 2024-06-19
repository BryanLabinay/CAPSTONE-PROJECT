<x-app-layout>
    <style>
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
            // Initialize the calendar
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                selectable: true,
                selectHelper: true,
                editable: true,

                select: function(start, end) {
                    var title = prompt('Enter Appointment Title:');
                    if (title) {
                        var eventData = {
                            title: title,
                            start: start,
                            end: end
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
    </script>

</x-app-layout>
