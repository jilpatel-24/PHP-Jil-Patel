@extends('website.layout.structure')

@section('content')
<style>
/* Page padding so header doesn't cover content */
.checkout-wrapper {
  padding-top: 140px;   /* match your site's header height */
  padding-bottom: 80px; /* extra bottom space so footer won't overlap */
  background: #f6f6f6;
  min-height: 70vh;
}

/* Card layout */
.checkout-card {
  background: #fff;
  border-radius: 12px;
  padding: 24px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.06);
}

/* Two column grid */
.checkout-grid {
  display: grid;
  grid-template-columns: 1fr 360px; /* left flexible, right summary fixed */
  gap: 28px;
  align-items: start;
}

/* On small screens stack */
@media (max-width: 991.98px) {
  .checkout-grid { grid-template-columns: 1fr; }
}

/* Form basics */
.form-row { margin-bottom: 12px; }
.label { display:block; font-weight:600; margin-bottom:6px; color:#333; }
.input, textarea, select {
  width:100%;
  padding:10px 12px;
  border-radius:8px;
  border:1px solid #e6e6e6;
  font-size:14px;
  box-sizing:border-box;
  background:#fff;
}

/* Buttons */
.btn-primary {
  background:#f0c14b;
  color:#000;
  padding:10px 18px;
  border-radius:50px;
  border:none;
  font-weight:700;
  cursor:pointer;
}
.btn-primary[disabled] { opacity:0.6; cursor:not-allowed; }

/* Summary box */
.order-summary {
  background:#fbfbfb;
  border-radius:10px;
  padding:16px;
  border:1px solid #eee;
  position:relative;
}

/* Product list in summary */
.summary-item { display:flex; justify-content:space-between; margin-bottom:8px; color:#555; }
.summary-item .name { max-width:220px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }

/* Totals */
.summary-row { display:flex; justify-content:space-between; margin-bottom:10px; color:#666; }
.summary-total { font-size:18px; font-weight:800; display:flex; justify-content:space-between; }

/* Make sure long footer spacing is present on very short pages */
.page-bottom-spacer { height: 48px; }

/* small niceties */
.help-text { font-size:13px; color:#888; margin-top:6px; }
</style>

<div class="checkout-wrapper">
  <div class="container">
    <div class="checkout-card">

      <h2 style="margin-bottom:14px; font-weight:800;">Checkout</h2>

      <div class="checkout-grid">

        {{-- LEFT: Checkout Form --}}
        <div>
          @php
            $cart = session('cart', []);
            $productIds = array_keys($cart);
            $computedSubtotal = 0;
            foreach ($cart as $pid => $it) {
                $price = isset($it['price']) ? (float)$it['price'] : 0;
                $qty = isset($it['qty']) ? (int)$it['qty'] : (isset($it['quantity']) ? (int)$it['quantity'] : 1);
                $computedSubtotal += $price * $qty;
            }
            $shipping = 0;
            $tax = ($computedSubtotal > 0) ? ($computedSubtotal * 0.05) : 0;
            $total = $computedSubtotal + $shipping + $tax;
          @endphp

          <form action="{{ route('checkout.store') }}" method="POST">
            @csrf

            {{-- If you load customers from controller, use that. Fallback to a simple text input --}}
            @if(isset($customers) && $customers->count() > 0)
              <div class="form-row">
                <label class="label">Customer</label>
                
                <select name="cust_name" class="input" required>
                  <option value="">-- Select customer --</option>
                  @foreach($customers as $c)
                    <option value="{{ $c->id }}" @if(old('name') == $c->id) selected @endif>
                      {{ $c->name }}
                    </option>
                  @endforeach
                </select>

                @error('cust_name') <div class="help-text" style="color:#d9534f;">{{ $message }}</div> @enderror
              </div>
            @else
              <div class="form-row">
                <label class="label">Full name</label>
                <input class="input" name="cust_name" value="{{ old('cust_name') }}" required />
                @error('cust_name') <div class="help-text" style="color:#d9534f;">{{ $message }}</div> @enderror
              </div>
            @endif



            <div class="form-row">
              <label class="label">Shipping address</label>
              <textarea class="input" name="Address" rows="4" required>{{ old('Address') }}</textarea>
              @error('Address') <div class="help-text" style="color:#d9534f;">{{ $message }}</div> @enderror
            </div>

            <div style="display:flex; gap:12px; margin-bottom:12px;">
              <div style="flex:1;">
                <label class="label">City</label>
                <input class="input" name="city" value="{{ old('city') }}" required />
                @error('city') <div class="help-text" style="color:#d9534f;">{{ $message }}</div> @enderror
              </div>

              <div style="flex:1;">
                <label class="label">State</label>
                <input class="input" name="state" value="{{ old('state') }}" required />
                @error('state') <div class="help-text" style="color:#d9534f;">{{ $message }}</div> @enderror
              </div>
            </div>

            <div class="form-row">
              <label class="label">Pincode</label>
              <input class="input" name="pincode" value="{{ old('pincode') }}" required />
              @error('pincode') <div class="help-text" style="color:#d9534f;">{{ $message }}</div> @enderror
            </div>

            {{-- Hidden product ids (store IDs in DB) and computed total --}}
            <input type="hidden" name="p_name" value="{{ implode(',', $productIds) }}">
            <input type="hidden" name="t_price" value="{{ number_format($total, 2, '.', '') }}">

            <div class="form-row">
              <button type="submit" class="btn-primary" @if(empty($cart)) disabled @endif>
                Place Order
              </button>
            </div>

          </form>
        </div>

        {{-- RIGHT: Order Summary --}}
        <div>
          <div class="order-summary">
            <h4 style="margin:0 0 12px 0; font-weight:700;">Order summary</h4>

            @if(empty($cart))
              <p class="help-text">Your cart is empty.</p>
            @else
              @foreach($cart as $pid => $item)
                @php
                  $name = $item['name'] ?? 'Product';
                  $price = isset($item['price']) ? (float)$item['price'] : 0;
                  $qty = isset($item['qty']) ? (int)$item['qty'] : (isset($item['quantity']) ? (int)$item['quantity'] : 1);
                @endphp
                <div class="summary-item">
                  <div class="name">{{ $name }} × {{ $qty }}</div>
                  <div>₹{{ number_format($price * $qty, 2) }}</div>
                </div>
              @endforeach

              <hr style="margin:12px 0; border-color:#eee;" />

              <div class="summary-row"><div>Subtotal</div><div>₹{{ number_format($computedSubtotal, 2) }}</div></div>
              <div class="summary-row"><div>Shipping</div><div>{{ $shipping === 0 ? 'Free' : '₹'.number_format($shipping,2) }}</div></div>
              <div class="summary-row"><div>GST (5%)</div><div>₹{{ number_format($tax, 2) }}</div></div>

              <hr style="margin:12px 0; border-color:#eee;" />
              <div class="summary-total"><div>Total</div><div>₹{{ number_format($total, 2) }}</div></div>
            @endif

          </div>
        </div>

      </div> {{-- end grid --}}

    </div> {{-- end card --}}
  </div> {{-- end container --}}
</div>

<div class="page-bottom-spacer"></div>

@endsection
