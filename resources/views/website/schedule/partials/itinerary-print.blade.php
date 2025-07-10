<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    {{-- <link rel="shortcut icon" href="{{ asset('static/assets/logo-zamira-only.png') }}" type="image/x-icon"> --}}
    <title>{{ @$setting->firstWhere('key', 'name')->value }} - Itinerary {{ $schedule->name ?? 'Jadwal Keberangkatan' }}
    </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #000;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            height: 100px;
        }

        .schedule-title {
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            vertical-align: top;
        }

        th {
            background-color: #005354;
            color: white;
            text-align: left;
        }

        ul {
            padding-left: 1rem;
            margin: 0;
        }

        li {
            margin-bottom: 4px;
        }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('static/assets/logo-zamira.png') }}" alt="Logo">
        <h2 style="text-transform: uppercase; margin-bottom:0px !important;">Itinerary
            {{ @$setting->firstWhere('key', 'name')->value }}
            <br>
            Paket {{ $schedule->pilgrimageType->name }}
        </h2>
        <h4 style="font-size: 14px;  margin-bottom:0px !important;">
            {{ strtoupper(remove_emojis($schedule->name)) }}
            <br>
            {{ $schedule->departure_date->format('d M Y') }} -
            {{ $schedule->duration }} Hari
        </h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>Hari</th>
                <th>Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedule->itineraries as $key => $itinerary)
                @php
                    $lines = explode("\n", $itinerary->description);
                @endphp
                <tr>
                    <td style="width: 120px;">
                        {{ $itinerary->date->locale('id')->translatedFormat('l, d M Y') }}
                    </td>
                    <td>
                        <div><strong>{{ $itinerary->location }}</strong></div>
                        <ul style="padding-left: 1.2rem; margin: 4px 0 0 0;">
                            @foreach ($lines as $line)
                                @if (trim($line) !== '')
                                    <li>{!! nl2br(e($line)) !!}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
