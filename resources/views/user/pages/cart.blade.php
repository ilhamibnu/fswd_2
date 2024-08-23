@extends('user.layout.layout')

@section('content')
<!-- Start Cart Area  -->
<div class="axil-product-cart-area axil-section-gap">
    <div class="container">
        <div class="axil-product-cart-wrap">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-2">



                <?php

                    $nomer = 1;

                    ?>

                @foreach($errors->all() as $error)
                <li>{{ $nomer++ }}. {{ $error }}</li>
                @endforeach
            </div>
            @endif
            <form action="/cart/update" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cart as $item)
                            <tr>
                                <td class="product-remove"><button type="button" class="remove-wishlist" data-id="{{ $item->id }}"><i class="fal fa-times"></i></button></td>
                                <td class="product-thumbnail"><a href="/detail/{{ $item->product->id }}"><img src="{{ asset('product/'.$item->product->image) }}" alt="Product Images"></a></td>
                                <td class="product-title"><a href="/detail/{{ $item->product->id }}">{{ $item->product->name }}</a></td>
                                <td class="product-price" data-title="Price"><span class="currency-symbol">Rp. </span>{{ number_format($item->product->harga) }}</td>
                                <td class="product-quantity" data-title="Qty">
                                    <div class="pro-qty">
                                        <input type="number" name="items[{{ $item->id }}][jumlah]" class="quantity-input" value="{{ $item->jumlah }}">
                                    </div>
                                </td>
                                <input type="hidden" name="items[{{ $item->id }}][id]" value="{{ $item->id }}">
                                <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">Rp. </span>{{ number_format($item->product->harga * $item->jumlah) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="cart-update-btn-area">
                    <div class="update-btn">
                        <button type="submit" class="axil-btn btn-outline">Update Cart</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                    <div class="axil-order-summery mt--80">
                        <h5 class="title mb--20">Order Summary</h5>
                        <div class="summery-table-wrap">
                            <table class="table summery-table mb--30">
                                <tbody>
                                    <tr class="order-total">
                                        <td>Total</td>
                                        <td class="order-total-amount">Rp. {{ number_format($sum_total) }}
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <form action="/cart/checkout" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Cart Area  -->
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.remove-wishlist').forEach(function(button) {
            button.addEventListener('click', function() {
                var itemId = this.getAttribute('data-id');
                var form = document.createElement('form');
                form.action = '/cart/' + itemId;
                form.method = 'POST';

                // Tambahkan input hidden untuk CSRF token
                var csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}';
                form.appendChild(csrfInput);

                // Tambahkan input hidden untuk method DELETE
                var methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                // Tambahkan form ke body dan submit
                document.body.appendChild(form);
                form.submit();
            });
        });
    });

</script>
@endsection
