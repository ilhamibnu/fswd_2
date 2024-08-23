@extends('user.layout.layout')

@section('content')
<!-- Start Checkout Area  -->
<div class="axil-checkout-area axil-section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="axil-checkout-billing">
                    <h4 class="title mb--40">Billing details</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Name <span>*</span></label>
                                <input disabled type="text" id="first-name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email<span>*</span></label>
                                <input disabled type="text" id="last-name" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="axil-order-summery order-checkout-summery">
                <h5 class="title mb--20">Your Order</h5>
                <div class="summery-table-wrap">
                    <table class="table summery-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transaksi->detailTransaksi as $item)
                            <tr class="order-product">
                                <td>{{ $item->product->name }} <span class="quantity">x{{ $item->jumlah }}</span></td>
                                <td>Rp. {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                            <tr class="order-total">
                                <td>Total</td>
                                <td class="order-total-amount">Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($transaksi->status_pembayaran == 'Belum Pilih Pembayaran')
                <div class="order-payment-method">
                    <div class="single-payment">
                        <div class="input-group">
                            <input checked type="radio" id="radio4" name="payment">
                            <label for="radio4">Direct bank transfer</label>
                        </div>
                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                    </div>
                </div>
                <button type="submit" id="pay-button" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                @else
                <div class="order-payment-method">
                    <p>
                        <ul>
                            <li>
                                Status Pembayaran : {{ $transaksi->status_pembayaran }} <br>
                                Bank : {{ $transaksi->bank }} <br>
                                No Rekening : {{ $transaksi->no_va }} <br>
                                Expired : {{ $transaksi->expired_at }}
                            </li>
                        </ul>
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Checkout Area  -->
@endsection


@section('script')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-xIE2EKmOwAlhBnJa"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    document.getElementById('pay-button').onclick = function() {
        // SnapToken acquired from previous step
        snap.pay('{{ $snapToken }}');
    };

</script>
@endsection
