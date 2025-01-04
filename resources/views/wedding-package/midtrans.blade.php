@extends('layouts.user')

@section('title', 'Pembayaran Wedding Package')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="section-title text-center mb-4">Pembayaran Wedding Package</h1>
        <div class="alert alert-info">
            Silahkan lanjutkan pembayaran menggunakan metode Dompet Digital.
        </div>

        <button id="pay-button" class="btn-booking w-100">Bayar dengan Dompet Digital</button>
    </div>

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-I8cZwkRdtdh36Q72"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            console.log('Button clicked!');
            snap.pay('{{ $snap_token }}', {
                onSuccess: function(result) {
                    console.log('Success:', result);
                    alert('Pembayaran berhasil: ' + JSON.stringify(result));
                    window.location.href =
                        "{{ route('wedding-package.resi', ['id' => $reservation->id]) }}";
                },
                onPending: function(result) {
                    console.log('Pending:', result);
                    alert('Pembayaran tertunda: ' + JSON.stringify(result));
                },
                onError: function(result) {
                    console.log('Error:', result);
                    alert('Pembayaran gagal: ' + JSON.stringify(result));
                }
            });
        };
    </script>
@endsection
