@extends('frontend.layout.master')
@section('content') 
<!-- Blog Archive -->
  <section id="aa-blog-archive">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-blog-archive-area">
            <div class="row">
              <div class="col-md-9">
                <!-- Blog details -->
                <div class="aa-blog-content aa-blog-details">
                  <article class="aa-blog-content-single">                        
                    <h2>{{ $news->title }}</h2>
                     <div class="aa-article-bottom">
                      <div class="aa-post-author">
                        Posted By <a href="#">{{ $news->user->username }}</a>
                      </div>
                      <div class="aa-post-date">
                        {{ $news->created_at->format('M d Y') }}
                      </div>
                    </div>
                    <figure class="aa-blog-img">
                      <a href="{{ route('frontend.detailnews', ['id'=>$news->id]) }}"><img src="{{ $news->link_image }}" alt="fashion img"></a>
                    </figure>
                    <div>
                        {!! html_entity_decode($news->content ) !!}
                    </div>
                    <div class="blog-single-bottom">
                      <div class="row">
                        <div class="col-md-8 col-sm-6 col-xs-12">
                          <div class="blog-single-tag">
                            <span>Tags:</span>
                            <a href="#">Fashion,</a>
                            <a href="#">Beauty,</a>
                            <a href="#">Lifestyle</a>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <div class="blog-single-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  </article>
                  <!-- blog navigation -->
                  {{--  <div class="aa-blog-navigation">
                    <a class="aa-blog-prev" href="#"><span class="fa fa-arrow-left"></span>Trước</a>
                    <a class="aa-blog-next" href="#">Tiếp<span class="fa fa-arrow-right"></span></a>
                  </div>  --}}
                  <!-- Blog Comment threats -->
                  <div class="aa-blog-comment-threat">
                    <h3>Bình luận ({{ count($list_comment) }})</h3>
                    <div class="comments">
                      <ul class="commentlist">
                        @foreach ($list_comment as $item)
                          <li>
                            <div class="media">
                              <div class="media-left">    
                                  <img class="media-object news-img" src="{{ $item->image }}" alt="img">      
                              </div>
                              <div class="media-body">
                               <h4 class="author-name">{{ $item->fullname }}</h4>
                               <a href=""></a> 
                               <span class="comments-date"> {{ $item->created_at->format('M d Y') }}</span>
                               <p>{{ $item->content }}</p>
                               {{--  <div style="display: flex">
                                <a href=""><i style="margin-right: 3px;font-size: 18px" class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                                <a href=""><i style="font-size: 18px" class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                               </div>  --}}
                               {{--  <a href="#" class="reply-btn">Reply</a>  --}}
                              </div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                      @if($list_comment != null)
                        <nav aria-label="Page navigation" style="text-align: center">
                            <b>{{$list_comment->links() }}</b>
                        </nav>
                      @endif
                    </div>
                  </div>
                  <!-- blog comments form -->
                  <div id="respond">
                    <h3 class="reply-title">Bình luận</h3>
                    <form method="POST" action="{{ route('frontend.postcomment') }}" id="commentform">
                      @csrf
                      <p class="comment-notes">
                        Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu <span class="required">*</span>
                      </p>
                      <input value="{{ $news->id }}" type="text" name="id_news" style="display: none">
                      @if (Auth::check())
                        <p class="comment-form-author">
                          <label for="author">Họ Tên <span class="required">*</span></label>
                          <input readonly type="text" name="fullname" value="{{ Auth::user()->fullname }}" size="30" required="required">
                        </p>
                        <p class="comment-form-email">
                          <label for="email">Email <span class="required">*</span></label>
                          <input readonly type="email" name="email" value="{{ Auth::user()->email }}" aria-required="true" required="required">
                        </p>
                        <input value="{{ Auth::user()->image_profile }}" type="text" name="image" style="display: none">
                      @else
                        <p class="comment-form-author">
                          <label for="author">Họ Tên <span class="required">*</span></label>
                          <input type="text" name="fullname" value="" size="30" required="required">
                        </p>
                        @if ($errors->has('fullname'))
                            <strong style="color: red">{{ $errors->first('fullname') }}</strong>
                        @endif
                        <p class="comment-form-email">
                          <label for="email">Email <span class="required">*</span></label>
                          <input type="email" name="email" value="" aria-required="true" required="required">
                        </p>
                        @if ($errors->has('email'))
                            <strong style="color: red">{{ $errors->first('email') }}</strong>
                        @endif
                      @endif
                      <p class="comment-form-comment">
                        <label for="comment">Bình luận <span class="required">*</span></label>
                        <textarea name="content" cols="45" rows="8" aria-required="true" required="required"></textarea>
                      </p>
                        @if ($errors->has('content'))
                            <strong style="color: red">{{ $errors->first('content') }}</strong>
                        @endif
                      <p class="form-submit">
                        <input type="submit" name="submit" class="aa-browse-btn" value="Đăng bình luận">
                      </p>        
                    </form>
                  </div>
                </div>
              </div>

              <!-- blog sidebar -->
              <div class="col-md-3">
                <aside class="aa-blog-sidebar">
                  <div class="aa-sidebar-widget">
                    <h3>Danh mục</h3>
                    <ul class="aa-catg-nav">
                      @foreach ($categories as $item)
                        <li><a href="{{ route('frontend.detailcategorynews', ['slug_name'=>$item->slug_name]) }}">{{ $item->category_name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Tags</h3>
                    <div class="tag-cloud">
                      <a href="#">Fashion</a>
                      <a href="#">Ecommerce</a>
                      <a href="#">Shop</a>
                      <a href="#">Hand Bag</a>
                      <a href="#">Laptop</a>
                      <a href="#">Head Phone</a>
                      <a href="#">Pen Drive</a>
                    </div>
                  </div>
                  <div class="aa-sidebar-widget">
                    <h3>Tin liên quan</h3>
                    <div class="aa-recently-views">
                      <ul>
                        @php
                          $count = 0;
                        @endphp
                        @foreach ($list_news as $item)
                          <li>
                            <a class="aa-cartbox-img" href="{{ route('frontend.detailnews', ['id'=>$item->id]) }}"><img src="{{ $item->link_image }}" alt="img"></a>
                            <div class="aa-cartbox-info">
                              <h4><a href="{{ route('frontend.detailnews', ['id'=>$item->id]) }}">{{ $item->title }}</a></h4>
                              <p>{{ $item->created_at->format('M d Y') }}</p>
                            </div>                    
                          </li> 
                          @php
                            $count++;
                          @endphp
                          @if ($count==3)
                              @break
                          @endif
                        @endforeach                                    
                      </ul>
                    </div>                            
                  </div>
                </aside>
              </div>
            </div>         
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Blog Archive -->


  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Đăng kí nhận tin mới</h3>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Nhập email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
@endsection