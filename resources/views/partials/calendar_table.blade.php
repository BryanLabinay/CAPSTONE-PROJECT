@php
    $firstDay = (new DateTime("$currentYear-$currentMonth-01"))->format('w');
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
    $date = 1;
@endphp
@for ($i = 0; $i < 6; $i++)
    <tr>
        @for ($j = 0; $j < 7; $j++)
            @if ($i === 0 && $j < $firstDay)
                <td></td>
            @elseif ($date > $daysInMonth)
            @break

        @else
            @php
                $currentDate =
                    $currentYear .
                    '-' .
                    str_pad($currentMonth, 2, '0', STR_PAD_LEFT) .
                    '-' .
                    str_pad($date, 2, '0', STR_PAD_LEFT);
                $appointmentCount = $appointmentCounts->get($currentDate, 0);
            @endphp
            <td style="position: relative;">
                <a href="#" data-bs-toggle="modal" data-bs-target="#appointmentModal"
                    data-date="{{ $currentDate }}"
                    class="calendar-date-link text-decoration-none fw-semibold text-black">
                    {{ $date }}
                </a>
                <div
                    style="position: absolute; top: -0px; right: 25px; width: 20px; height: 20px; border-radius: 50%; background-color: red; opacity: {{ $appointmentCount == 0 ? 0 : 1 }}; display: flex; align-items: center; justify-content: center; color: white; font-size: 12px;">
                    {{ $appointmentCount }}
                </div>
            </td>
            @php $date++; @endphp
        @endif
    @endfor
</tr>
@endfor
