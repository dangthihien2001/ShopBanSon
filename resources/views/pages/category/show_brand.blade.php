@extends('main')
@section('content')

	<!-- Menu -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Thương Hiệu Sản Phẩm> {{$ten_th;}}
					</button>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Danh Mục/Thương Hiệu
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>           

				<!-- Filter/Danh mục sản phẩm -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Danh mục
							</div>

							<ul>
                                @foreach ($danhmuc as $item)
                                    <li class="p-b-6">
                                        <a href="{{URL::to('/Danh-Muc-San-Pham/'.$item->ID_DM)}}" class="filter-link stext-106 trans-04">
                                           {{  $item->TenDanhMuc }}
                                        </a>
                                    </li>                                
                                @endforeach
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Thương Hiệu
							</div>

							<ul>
                                @foreach ($thuonghieu as $item_th)
                                    <li class="p-b-6">
                                        <a href="{{URL::to('/Thuong-Hieu/'.$item_th->ID_TH)}}" class="filter-link stext-106 trans-04 ">
                                            {{ $item_th->TenThuongHieu; }}
                                        </a>
                                    </li>                                  
                                @endforeach

							</ul>
						</div>

					</div>
				</div>
			</div>

			<div id="loadProduct">
                @include('pages.products.list')
            </div>

		</div>
	</div> 
@endsection
