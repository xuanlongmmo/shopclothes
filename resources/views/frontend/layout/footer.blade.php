<!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="{{ route('frontend.index') }}">Trang chủ</a></li>
                    <li><a href="{{ route('frontend.listproduct') }}">Sản phẩm</a></li>
                    <li><a href="{{ route('frontend.news') }}">Tin tức</a></li>
                    <li><a href="{{ route('frontend.contact') }}">Liên hệ</a></li>
                    <li><a href="{{ route('frontend.index') }}">Chi nhánh</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Chính sách</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Chính sách đổi hàng</a></li>
                      <li><a href="#">Chính sách bảo hành</a></li>
                      <li><a href="#">Chính sách bảo mật</a></li>
                      <li><a href="#">Chính sách hoàn tiền</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên hệ với chúng tôi</h3>
                    <address>
                      <p>{{ $data_unique[0]->address }}</p>
                      <p><span class="fa fa-phone"></span>{{ $data_unique[0]->phone }}</p>
                      <p><span class="fa fa-envelope"></span>{{ $data_unique[0]->email }}</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="{{ $data_unique[0]->facebook }}"><span class="fa fa-facebook"></span></a>
                      <a href="{{ $data_unique[0]->twitter }}"><span class="fa fa-twitter"></span></a>
                      <a href="{{ $data_unique[0]->instagram }}"><span class="fa fa-instagram"></span></a>
                      <a href="{{ $data_unique[0]->youtube }}"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-md-3 col-sm-6">
              <div class="aa-footer-widget">
                <div class="aa-footer-widget">
                  <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faobongdasale%2F&tabs=timeline&width=300px&height=50px&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=2660291120893115" width="300px" height="170px" style="margin-top: 25px;border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">Xuân Long</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->