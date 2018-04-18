@extends('layouts.app') @section('content')
     <div class="divider col-sm-12 col-xs-12 col-md-12">
        <div class="header-text"><span>Contact</span> Us</div>
    </div>

                <div class="col-md-6 col-md-offset-1 col-sm-7 col-xs-12">

                    <div class="widget">
                        <h3 class="widget-title style5">Contact</h3>
                        <p>You can reach us through these contacts</p>
                        <ul class="clearfix">
                            <li>
                                <p><span class="fa fa-envelope-o"></span>Email: <a href="mailto:havenbbc1996@gmail.com">havenbbc1996@gmail.com</a></p>
                            </li>
                            <li>
                                <p><span class="fa fa-phone"></span>Phone: (+63) 915 325 4919</p>
                            </li>
                            <li>
                                <p><span class="fa fa-facebook"></span><a href="https://web.facebook.com/havenbbc">&nbsp;&nbsp;&nbsp;&nbsp;Facebook Page</a></p>
                            </li>
                            <li>
                                <p><span class="fa fa-map-marker"></span>Address: L 18, B 21, Jasmin St., Almanza Dos, Las Pinas, Metro Manila</p>
                            </li>
                        </ul>
                    </div>
                    <!-- widget -->

                </div>
                <!-- col-md-7 -->

        <div class="contact-form-full col-md-4 col-sm-4 col-xs-11">

          <div class="inner contact">
            <!-- Form Area -->
            <div class="contact-form">
                <!-- Form -->
                {!! Form::open(['action' => 'FeedbacksController@store','id'=>'contact-us', 'method' => 'POST']) !!}
                    @include('inc.messages')
                    <!-- Left Inputs -->
                    <div class="col-xs-12 wow animated slideInLeft" data-wow-delay=".5s">
                        <!-- Name -->
                        <input type="text" name="name" id="name" required="required" class="form" placeholder="Name" />
                        <!-- Email -->
                        <input type="email" name="email" id="mail" required="required" class="form" placeholder="Email" />

                    </div><!-- End Left Inputs -->
                    <!-- Right Inputs -->
                    <div class="col-xs-12 wow animated slideInRight" data-wow-delay=".5s">
                        <!-- Message -->
                        <textarea name="message" id="message" class="form textarea"  placeholder="Message"></textarea>
                        <div class="g-recaptcha col-xs-12" data-sitekey="6Lfl1VMUAAAAABIU9JamQJfDJ_MdnyjJGC0uaBWO"></div>
                    </div><!-- End Right Inputs -->
                   
                    <!-- Bottom Submit -->
                    <div class="relative fullwidth col-xs-12">
                        <!-- Send Button --><br>
                        <button type="submit" id="submit" name="submit" class="form-btn semibold">Send Message</button>
                    </div><!-- End Bottom Submit -->
                    <!-- Clear -->
                    <div class="clear"></div>
                </form>

                <!-- Your Mail Message -->
                <div class="mail-message-area">
                    <!-- Message -->
                    <div class="alert gray-bg mail-message not-visible-message">
                        <strong>Thank You !</strong> Your email has been delivered.
                    </div>
                </div>

            </div><!-- End Contact Form Area -->
        </div><!-- End Inner -->
      </div>
        <!-- wrapper -->
    </section>
  <section class="map">
      <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA09MBHmTOUkYyYZJR0g_2fwMw1qb-ftUw&q=Haven+Bible+Baptist+Church+Las+Piñas" width="100%" height="450" frameborder="0" style="border:0">
      </iframe>
  </section>
  @endsection
