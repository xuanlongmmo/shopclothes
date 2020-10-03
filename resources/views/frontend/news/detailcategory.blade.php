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
              <div class="aa-blog-content">
                <div class="row">
                  @foreach ($news as $item)
                    <div class="col-md-4 col-sm-4">
                      <article class="aa-blog-content-single">                        
                        <h4><a href="{{ route('frontend.detailnews', ['id'=>$item->id]) }}">{{ $item->title }}</a></h4>
                        <figure class="aa-blog-img">
                          <a href="{{ route('frontend.detailnews', ['id'=>$item->id]) }}"><img style="width: 270px;height: 150px;" src="{{ $item->link_image }}" alt="fashion img"></a>
                        </figure>
                        <div class="news">{!! html_entity_decode($item->content) !!}</div>
                        <div class="aa-article-bottom">
                          <div class="aa-post-author">
                            Posted By <a href="#">{{ $item->user->username }}</a>
                          </div>
                          <div class="aa-post-date">
                            {{ $item->created_at->format('M d Y') }}
                          </div>
                        </div>
                      </article>
                    </div>
                  @endforeach
                </div>
              </div>
              <!-- Blog Pagination -->
              @if($news != null)
                    <nav aria-label="Page navigation" style="text-align: center">
                        <b>{{$news->links() }}</b>
                    </nav>
              @endif
            </div>
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
                  <h3>Bài đăng mới nhất</h3>
                  <div class="aa-recently-views">
                    <ul>
                      @php
                        $count = 0;
                      @endphp
                      @foreach ($news as $item)
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
@endsection