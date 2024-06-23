<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pencarian Maskapai</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Pemesanan Tiket') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container mt-5">
                            <form id="searchForm">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="name">Maskapai</label>
                                        <input type="text" class="form-control" id="airline"
                                            placeholder="Maskapai">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="date">Tanggal</label>
                                        <input type="date" class="form-control" id="departure_date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="destination">Tujuan</label>
                                        <input type="text" class="form-control" id="destination"
                                            placeholder="Tujuan">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="origin">Asal</label>
                                        <input type="text" class="form-control" id="from" placeholder="Asal">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="price">Harga</label>
                                        <input type="number" class="form-control" id="price" placeholder="Harga">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" onclick="searchData()">Cari</button>
                            </form>

                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Tujuan</th>
                                        <th>Asal</th>
                                        <th>Harga</th>
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
    </x-app-layout>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const data = @json($flights);

        function searchData() {
            const airline = document.getElementById('airline').value.toLowerCase();
            const departure_date = document.getElementById('departure_date').value;
            const destination = document.getElementById('destination').value.toLowerCase();
            const from = document.getElementById('from').value.toLowerCase();
            const price = document.getElementById('price').value;

            const filteredData = data.filter(item => {
                return (airline === "" || item.airline.toLowerCase().includes(airline)) &&
                    (departure_date === "" || item.departure_date === departure_date) &&
                    (destination === "" || item.destination.toLowerCase().includes(destination)) &&
                    (from === "" || item.from.toLowerCase().includes(from)) &&
                    (price === "" || item.price === price);
            });

            displayData(filteredData);
        }

        function displayData(data) {
            const dataTable = document.getElementById('dataTable');
            dataTable.innerHTML = "";
            data.map(item => {
                const url = "{{ route('bookings.create') }}?id=" + item.id;
                const row = `<tr>
                <td><a href=${url} title="booking">
                    ${item.airline}</td>
                <td>${item.departure_date}</td>
                <td>${item.destination}</td>
                <td>${item.from}</td>
                <td>${item.price}</td>
            </tr>`;
                dataTable.innerHTML += row;
            });
        }

        // Display all data initially
        displayData(data);
    </script>

</body>

</html>
