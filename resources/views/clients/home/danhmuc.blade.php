<section class="ftco-section ftco-category ftco-no-pt">
    
    <div class="container">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
          <span class="subheading">Danh mục nổi bật</span>
        <h2 class="mb-4">Danh mục của chúng tôi</h2>
        <p>Những mặt hàng trên cả tuyệt vời đến từ VEGEFOODS không làm bạn thất vọng</p>
      </div>
    </div>   		
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($listDanhMucs as $danhMuc)
                        <div class="col-lg-3 col-md-4 col-sm-6 mt-4"> <!-- Thêm các lớp cột cho từng kích thước màn hình -->
                            <div class="category-wrap ftco-animate img d-flex align-items-end"
                                style="background-image: url('{{ Storage::url($danhMuc->hinh_anh) }}');">
                                <div class="text px-3 py-1">
                                    <h2 class="mb-0"><a href="#">{{ $danhMuc->ten_danh_muc }}</a></h2>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
