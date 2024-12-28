<!DOCTYPE html>
<html>

<head>
    <title>Kelola Reservasi</title>
</head>

<body>
    <h1>Kelola Reservasi</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Background</th>
                <th>Jumlah Teman</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user_name }}</td>
                    <td>{{ $reservation->email }}</td>
                    <td>{{ $reservation->phone_number }}</td>
                    <td>{{ $reservation->schedule_date }}</td>
                    <td>{{ $reservation->schedule_time }}</td>
                    <td>{{ $reservation->background_choice }}</td>
                    <td>{{ $reservation->number_of_friends }}</td>
                    <td>{{ $reservation->total_payment }}</td>
                    <td>
                        <form action="{{ route('admin.selfphoto.destroy', $reservation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
