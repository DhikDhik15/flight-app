<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-Ticket_{{ $ticket['passenger'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <table class="table-stripped table-stripped-border">
        <tbody>
            <tr>
                <td>KODE BOOKING</td>
                <td>{{ $ticket['booking_code'] }}</td>
            </tr>
            <tr>
                <td>PENUMPANG</td>
                <td>{{ $ticket['passenger'] }}</td>
            </tr>
            <tr>
                <td>TANGGAL LAHIR</td>
                <td>{{ $ticket['passenger_birth_date'] }}</td>
            </tr>
            <tr>
                <td>KEBANGSAAN</td>
                <td>{{ $ticket['passenger_nationality'] }}</td>
            </tr>
            <tr>
                <td>MASKAPAI</td>
                <td>{{ $ticket['flight'] }}</td>
            </tr>
            <tr>
                <td>TANGGAL KEBERANGKATAN</td>
                <td>{{ $ticket['departure_date'] }}</td>
            </tr>
            <tr>
                <td>TANGGAL KEDATANGAN</td>
                <td>{{ $ticket['arrival_date'] }}</td>
            </tr>
            <tr>
                <td>KEBERANGKARAN</td>
                <td>{{ $ticket['from'] }}</td>
            </tr>
            <tr>
                <td>DESTINASI</td>
                <td>{{ $ticket['destination'] }}</td>
            </tr>
            <tr>
                <td>JUMLAH TRANSIT</td>
                <td>{{ $ticket['transit_count'] }}</td>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
