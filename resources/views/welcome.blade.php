@include('includeFile.headerArea')
<div class="wrap">
  <!-- page BODY -->
  <!-- ========================================================= -->
  <div class="page-body animated slideInDown">
      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
      <!--LOGO-->
      <div class="logo">
          <h2 class="text-center">Registration</h2>
      </div>
      <div class="box">
          <!--SIGN IN FORM-->
          <div class="panel mb-none">
              <div class="">
                  <form method="post" action="{{route('save-user')}}">
                    @csrf
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="text" class="form-control" name="first_name" placeholder="First Name,">
                              <i class="fa fa-user"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="text" class="form-control" name="last_name" placeholder="Last Name,">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" name="name_of_organization" placeholder="Name of organization,">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="text" class="form-control" name="street" placeholder="Street">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="text" class="form-control" name="city" placeholder="City">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="email" class="form-control" name="e_mail" placeholder="Email">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="text" class="form-control" name="mobile_number" placeholder="Mobile Number">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="password" class="form-control" name="password" placeholder="Password">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group mt-md">
                          <span class="input-with-icon">
                              <input type="password" class="form-control" name="co_password" placeholder="Co password">
                              <i class="fa fa-envelope"></i>
                          </span>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                      </div>
                      <div class="form-group text-center">
                          Have an account?, <a href="{{URL('login-from')}}">Login Here</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
  </div>
</div>


@include('includeFile.footerArea')
