@extends('frontend.layout.master')
@section('content') 
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>Chúng tôi sẵn sàng hỗ trợ bạn..</h2>
             <p></p>
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12028.025380393603!2d105.9904520310344!3d18.2746043014927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31385af057c8c6ed%3A0xbe993b154fc4a28c!2zQ2jhu6MgTeG7mkkgQ-G6qW0gSHV5Lg!5e0!3m2!1svi!2s!4v1595933369310!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           </div>
           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form  class="comments-form contact-form" method="POST" action="{{ route('frontend.postcontact') }}">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input name="name" type="text" placeholder="Họ và tên" class="form-control">
                          <span style="color: red">{{ $errors->first('name') }}</span><br>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input name="email" type="text" placeholder="Email" class="form-control">
                          <span style="color: red">{{ $errors->first('email') }}</span><br>
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input name="title" type="text" placeholder="Tiêu đề" class="form-control">
                          <span style="color: red">{{ $errors->first('title') }}</span><br>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input name="phone" type="text" placeholder="Số điện thoại" class="form-control">
                          <span style="color: red">{{ $errors->first('phone') }}</span><br>
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea name="content" class="form-control" rows="3" placeholder="Nội dung"></textarea>
                      <span style="color: red">{{ $errors->first('content') }}</span><br>
                    </div>
                    <button class="aa-secondary-btn">Gửi</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h4>{{ $data_unique[0]->branch_name }}</h4>
                     <p><span class="fa fa-home"></span>{{ $data_unique[0]->address }}</p>
                     <p><span class="fa fa-phone"></span>{{ $data_unique[0]->phone }}</p>
                     <p><span class="fa fa-envelope"></span>Email: {{ $data_unique[0]->email }}</p>
                   </address>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection