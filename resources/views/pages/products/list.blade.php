<!--product  -->		
<div class="row isotope-grid">
    <!--Anh san pham -->
    @foreach ($tat_ca_sp as $item_sp ) <!--start foreach-->
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0">
                    <img src="{{URL::to('public/uploads/products/'.$item_sp->HinhAnh)}}" alt="#">

                    <a href="{{URL::to('/Chi-Tiet-San-Pham/'.$item_sp->ID_SP)}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 "> <!--(js-show-modal1)-->
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            {{ $item_sp->TenSP; }}  <!--tensp-->
                        </a>

                        <span class="stext-105 cl3">
                            {{ number_format($item_sp->DonGiaBan).' VNĐ'}} <!--dongia-->
                        </span>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="/frontend/images/icons/icon-heart-01.png" alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="/frontend/images/icons/icon-heart-02.png" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>                   
    @endforeach  <!--end foreach-->
</div>

<!-- Pagination/Phan trang -->
<!-- Load more -->
<div class="flex-c-m flex-w w-full p-t-45">
    <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
        Xem Thêm
    </a>
</div>