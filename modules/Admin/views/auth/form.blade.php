
 <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" action="index.html" method="post">
                <h3>Sign In to Dashboard</h3>
                <p class="comment">We're happy you're here.</p>
                 @if ($errors->any())
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           {{ $error }}
                        @endforeach
                </div>
               @endif
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group {{ $errors->first('email', ' has-error') }}">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label>Email address</label>

                    {!! Form::email('email',null, ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Email' ])  !!} 
                </div>
                <div class="form-group {{ $errors->first('password', ' has-error') }}">
                    <label>Password</label>
                      {!! Form::password('password', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Password' ])  !!} 

                    <div class="forgot"><a href="{{url('admin/forgot-password')}}">Forgot?</a></div>
                    </div>
                    <div class="savePass"><input type="checkbox" id="chkBox"> <label for="chkBox">Remember me</label></div>
                <div class="panelBtn">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                    <input type="submit" value="LOGIN" class="btn-login" />
                    </div>
                    </div>
                   
                </div>
                <div class="clearfix"></div>
                
               
            </form>
           
        </div>


