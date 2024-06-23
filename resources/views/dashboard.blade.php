<link rel="stylesheet" href="{{ mix('css/app.css') }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container mt-5">
                            <form id="searchForm">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Penumpang</label>
                                        <input type="text" class="form-control" id="passengger"
                                            placeholder="Penumpang">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="destination">Kode Booking</label>
                                        <input type="text" class="form-control" id="booking_code"
                                            placeholder="Kode Booking">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="searchData()">Cari</button>
                                <button type="button" class="btn btn-success">Export</button>
                            </form>

                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Kode Booking</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Tujuan</th>
                                        <th>Asal</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    <!-- Data akan muncul di sini -->
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    const data = @json($transactions);

    function searchData() {
        const passengger = document.getElementById('passengger').value;
        const booking_code = document.getElementById('booking_code').value;

        const filteredData = data.filter(item => {
            return (passengger === "" || item.bookings[0]['passenger_name'] === passengger) &&
                (booking_code === "" || item.bookings[0]['booking_code'] === booking_code);
        });
        displayData(filteredData);
    }

    function displayData(data) {
        const dataTable = document.getElementById('dataTable');
        dataTable.innerHTML = "";
        data.map(item => {
            const row = `<tr>
            <td>
                ${item.bookings[0]['booking_code']}</td>
            <td>${item.bookings[0]['passenger_name']}</td>
            <td>${item.bookings[0]['flight']['departure_date']}</td>
            <td>${item.bookings[0]['flight']['destination']}</td>
            <td>${item.bookings[0]['flight']['from']}</td>
        </tr>`;
            dataTable.innerHTML += row;
        });
    }

    // Display all data initially
    displayData(data);
</script>
