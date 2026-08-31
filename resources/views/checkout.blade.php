<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Midtrans</title>
    <!-- Masukkan script Snap Midtrans -->
    <!-- Jika di production, ganti URL menjadi https://app.midtrans.com/snap/snap.js -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f9fafb; margin: 0; }
        .card { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); text-align: center; }
        .btn { background: #2563eb; color: white; border: none; padding: 10px 20px; font-size: 16px; border-radius: 4px; cursor: pointer; margin-top: 20px; }
        .btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>

    <div class="card">
        <h2>Checkout Pesanan</h2>
        <p><strong>Order ID:</strong> {{ $orderId }}</p>
        <p><strong>Total:</strong> Rp {{ number_format($grossAmount, 0, ',', '.') }}</p>
        
        <button id="pay-button" class="btn">Bayar Sekarang</button>
    </div>

    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        // Snap Token yang didapatkan dari Controller
        snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            alert("Pembayaran berhasil!"); 
            console.log(result);
          },
          onPending: function(result){
            alert("Menunggu pembayaran Anda!"); 
            console.log(result);
          },
          onError: function(result){
            alert("Pembayaran gagal!"); 
            console.log(result);
          },
          onClose: function(){
            alert('Anda menutup pop-up tanpa menyelesaikan pembayaran');
          }
        });
      };
    </script>
</body>
</html>
