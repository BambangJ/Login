

  <div class="container">

    <div class="row justify-content-center">
  <div class="col-xl-5 col-lg-12 col-md-9">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
       
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?= base_url('auth/Register');?>">
                <div class="form-group row"> 
                  
                    <input type="text" name="name" class="form-control form-control-user" id="exampleFullname" placeholder="Fullname">
                    <?= form_error('name','<small class="text-danger pl-3">','</small>')?>
                  </div>
                
                <div class="form-group row">
                 
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                </div>
               
                <div class="form-group row">
                  <div class="col-sm-15">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    <?= form_error('password','<small class="text-danger pl-3">','</small>')?>
                  </div>
                  <div class="col-sm-15">
                    <input type="password" name="repeat_password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                    <?= form_error('repeat_password','<small class="text-danger pl-3">','</small>')?>
                  </div>
                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
              
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth/index');?>">Already have an account? Login!</a>
              </div>
            </div>
       
        
      </div>
    </div>
  </div>
  </div>
  </div>


