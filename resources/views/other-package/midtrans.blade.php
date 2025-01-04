@extends('layouts.user')

@section('title', 'Pembayaran Dompet Digital')

@section('content')
    <div class="container mt-5 mb-5">
        <h1 class="text-center">Pembayaran Dompet Digital</h1>
        <p class="text-center">Silakan lakukan pembayaran untuk menyelesaikan transaksi Anda.</p>

        <div id="payment-button" class="text-center mt-4">
            <button id="pay-button" class="btn-booking">Bayar Sekarang</button>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href =
                        "{{ route('other-package.resi', ['id' => $reservation->id]) }}";
                },
                onPending: function(result) {
                    window.location.href =
                        "{{ route('other-package.resi', ['id' => $reservation->id]) }}";
                },
                onError: function(result) {
                    alert('Pembayaran gagal. Silakan coba lagi.');
                },
                onClose: function() {
                    alert('Anda menutup pembayaran tanpa menyelesaikannya.');
                }
            });
        });
    </script>
@endsection
