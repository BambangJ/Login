

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
         <div class="card-body p-0">
           <div class="p-3">
            <?= $this->session->flashdata('message');?>
             </div>
            </div>
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Hello Human!</h1>
                    
                  </div>
                    

                  <form class="user" method="post" action="<?=base_url('auth');?>">
                    <div class="form-group">
                      <input type="email" name="email" value="<?=set_value('email');?>" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      <?= form_error('email','<small class="text-danger pl-3">','</small>')?>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                      <?= form_error('password','<small class="text-danger pl-3">','</small>')?>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/Register');?>">Create an Account!!</a>
                  </div>
                </div>
             
           
          </div>
        </div>

      </div>

    </div>

  </div>

 

