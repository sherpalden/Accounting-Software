  @include('user.header')

<!--section-->
<section class="sec" style="margin-bottom: 0.9%;">
  <div class="container halfsection">
    <div class="row">
      <div class="col-lg-6">
        <div class="card" style="width:550px">
          <div class="card-body"> 
            
            <!--           form-->
            <form name="contact" id="contactform">
              <div class="form-group">
                <label for="name">Name: &nbsp;</label>
                <select class="form-control" id="gender" name="gender">
          <option value="">Select Title</option>
          <option value="Mr">Mr</option>
          <option value="Mrs">Mrs</option>
          <option value="Miss">Miss</option>
        </select>
                <input name="name" type="text" class="form-control" placeholder="What's your name?" id="name" >
              </div>
              <div class="form-group">
                <label for="email">Email: &nbsp;</label>
                <input name="email" type="email" id="email" class="form-control" placeholder="name@example.com" >
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="6" class="form-control" placeholder="Enter your message"></textarea>
              </div>
              <div class="">
                  <button type="Submit" class="btn btn-success pull-right">Submit</button>
                  <!-- <button type="button" class="btn btn-danger">Cancel</button> -->
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="row">
          <div class="card" style="width:550px">
            <div class="card-body">
              <h4 class="card-title tc">Location</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d883.556081963457!2d85.32711242917927!3d27.66146618675047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19d9206b015b%3A0xaa7f18e256625a9a!2sUnnamed+Road%2C+Patan+44700!5e0!3m2!1sen!2snp!4v1557590738007!5m2!1sen!2snp" width="100%" height="550" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('user.footer')