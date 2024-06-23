<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Reservation</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Reservation') }}
            </h2>
        </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="container">
                            <div class="row mt-5">
                                <div class="col-md-6">
                                    <form method="POST" action="{{ route('bookings.store') }}">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="nama"
                                                name="passenger_name" placeholder="Masukkan nama lengkap Anda">
                                        </div>

                                        <input type="hidden" name="flight_id" value="{{ $flight_id }}">

                                        <div class="mb-3">
                                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal_lahir"
                                                name="passenger_birth_date">
                                        </div>

                                        <div class="mb-3">
                                            <label for="kebangsaan" class="form-label">Kebangsaan</label>
                                            <select class="form-select" id="kebangsaan" name="passenger_nationality">
                                                <option value="">Pilih Kebangsaan</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="SG">Singapura</option>
                                                <option value="MY">Malaysia</option>
                                            </select>
                                        </div>


                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('flights.search') }}" type="button" class="btn btn-warning">Kembali</a>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
