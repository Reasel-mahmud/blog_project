@extends('frontend.master')
@section('content')
     <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Login</h1>
          </div>
        </div>

        <div class="form mt-5">
          <form action="{{route('login.user')}}" method="post" role="form" class="php-email-form">
            @csrf
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="userName" class="form-control" id="name" placeholder=" Enter Your Phone/Email " required>
              </div>
             <div class="form-group col-md-6">
              <input type="password" class="form-control" name="password" id="subject" placeholder="Password" required>
            </div>
            <div class="text-center">
              <button class="btn btn-sm btn-danger" type="submit">Send Message</button></div>
          </form>
        </div><!-- End Contact Form 
@endsection