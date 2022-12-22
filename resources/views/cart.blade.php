<!-- Cart/Giỏ hàng của bạn -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Giỏ hàng của bạn
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		<?php $content = Cart::content(); ?>
		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">
				@foreach ($content as $v_content )
				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="{{URL::to('public/uploads/products/'.$v_content->options->image)}}" alt="IMG">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							{{ $v_content->name }}
						</a>

						<span class="header-cart-item-info">
							{{ $v_content->qty.'*'.number_format($v_content->price)}} 
						</span>
					</div>
				</li>
				@endforeach
			</ul>
			
			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Tổng:  {{Cart::priceTotal().'vnđ' }}
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="{{URL::to('/show-cart/')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Xem giỏ hàng
					</a>

					@if (Session::get('HoTen'))
						<a href="{{ URL::to('/show-cart') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Thanh toán
						</a>
					@else
					<a href="{{ URL::to('/dangnhap') }}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
						Thanh toán
					</a>						
					@endif

				</div>
			</div>
		</div>
	</div>
</div>