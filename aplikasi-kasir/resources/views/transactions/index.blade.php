@php
    $total = 0;
    foreach ($carts as $cart) {
        $total += $cart->subtotal;
    }
@endphp

@extends('layouts.app')
@section('title', 'Transaksi | Penjualan')
@section('content')
    <div class="container my-3">
        <div class="container-fluid py-4">
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="d-flex">
                        <h2 class="fw-bold">Penjualan</h2>
                        <form class="d-flex ms-auto mb-2" action="/transaksi/search" method="get">
                            <input class="form-control me-2" type="search" name="keyword" placeholder="Search 🔍"
                                autocomplete="off"
                                @isset($keyword) value="{{ $keyword }}" @endisset />
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                    <p class="text-muted mb-4">Pilih barang yang ingin dibeli di bawah ini.</p>

                    <div class="row g-3">
                        @foreach ($products as $product)
                            @php
                                $pict = $product->pict;
                                if ($pict == null) {
                                    $pict = 'photo.png';
                                }
                            @endphp
                            <div class="col-md-4 col-lg-3">
                                <div class="product-card text-center">
                                    <img src="{{ asset('images/' . $pict) }}" alt="Foto Produk" class="product-img mb-2">
                                    <h6>{{ $product->product_name }}</h6>
                                    <p class="text-muted small mb-2">{{ $product->category_name }}</p>
                                    <h6 class="fw-semibold mb-2">
                                        {{ 'Rp ' . number_format($product->selling_price, 0, ',', '.') }} /
                                        {{ $product->unit_name }}</h6>

                                    <form action="/cart/store" method="post">
                                        @csrf
                                        <div class="d-flex justify-content-center align-items-center gap-2 mt-3">
                                            <input type="number" name="quantity" value="1" min="1"
                                                class="form-control text-center">
                                            <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                        </div>

                                        <button class="btn btn-store" type="submit">
                                            <i class="bi bi-cart-plus"></i> Add
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div style="width: fit-content; margin: 2rem auto;">
                        {{ $products->links() }}
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="order-panel">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold mb-0">Order #{{ $orderNo }}</h6>
                            <small class="text-muted">{{ \Carbon\Carbon::parse(now())->format('d M Y') }}</small>
                        </div>

                        <hr>

                        <div class="cart">
                            @foreach ($carts as $cart)
                                @php
                                    $pict = $product->pict;
                                    if ($pict == null) {
                                        $pict = 'photo.png';
                                    }
                                @endphp
                                <div class="order-item">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('images/' . $pict) }}" alt="Foto Barang">
                                        <div>
                                            <p class="mb-0 small fw-semibold">{{ $cart->product_name }} <small
                                                    class="text-muted">x
                                                    {{ $cart->quantity }} {{ $cart->unit_name }}</small></p>
                                            <small
                                                class="text-muted">{{ 'Rp ' . number_format($cart->subtotal, 0, ',', '.') }}</small>
                                        </div>
                                    </div>
                                    <div>
                                        <form action="/cart/delete/{{ $cart->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" type="submit"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <form action="/transaksi/store" method="post">
                            <div class="mb-2">
                                @csrf
                                <div class="d-flex justify-content-between">
                                    <span>Total</span>
                                    <input type="number" class="form-control form-control-sm" value="{{ $total }}"
                                        min="1" style="width: 10rem;" readonly id="total" name="total">
                                </div>
                                <div class="my-2 d-flex justify-content-between">
                                    <label class="form-label small mb-1">Bayar</label>
                                    <input type="number" class="form-control form-control-sm" value="0" min="1"
                                        style="width: 10rem;" id="paid" name="paid">
                                </div>
                                <div class="my-2 d-flex justify-content-between">
                                    <span>Kembali</span>
                                    <input type="number" class="form-control form-control-sm" value="0" min="1"
                                        style="width: 10rem;" readonly id="change" name="change">
                                </div>
                            </div>

                            <button class="btn-pay mt-3" type="submit">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const totalInput = document.getElementById('total');
        const paidInput = document.getElementById('paid');
        const changeInput = document.getElementById('change');

        paidInput.addEventListener('input', function() {
            const change = paidInput.value - totalInput.value;

            if (change > 0) {
                changeInput.value = change;
            } else {
                changeInput.value = 0;
            }
        });
    </script>
@endsection