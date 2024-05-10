@extends('depan.applayout')
@section('content')

<!-- contact section start -->
<div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h1 class="contact_taital">Contact Us</h1>
               </div>
            </div>
         </div>
         <div class="container-fluid">
            <div class="contact_section_2">
               <div class="row">
                  <div class="col-md-6">
                     <form action="">
                        <div class="mail_section_1">
                           <input type="text" class="mail_text" placeholder="Name" name="Name">
                           <input type="text" class="mail_text" placeholder="Phone Number" name="Phone Number"> 
                           <input type="text" class="mail_text" placeholder="Email" name="Email">
                           <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                           <div class="send_bt"><a href="#">SEND</a></div>
                        </div>
                     </form>
                  </div>
                  <div class="col-md-6 padding_left_15">
                     <div class="contact_img"><img src="{{asset('depan/images/contact-img.png')}}"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="map_main">
            <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15866.112625365517!2d106.6712783!3d-6.1938236!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9093d346ab9%3A0xb0ecd28102fbdf95!2sLPK%20HIKARI%20GAKKAI%20%5B%20Lembaga%20Pendidikan%20Dan%20Pelatihan%20Bahasa%20Jepang%20%5D!5e0!3m2!1sen!2sid!4v1715362027858!5m2!1sen!2sid"  width="600" height="600" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
            </div>
         </div>
      </div>
      <!-- contact section end -->



@endsection