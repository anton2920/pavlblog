<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="">
					<span class="login100-form-title p-b-32">
						Create Admin Account
					</span>

                <span class="txt1 p-b-11">
						Username
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                    <input class="input100" type="text" name="username" required>
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Full Name
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Full name is required">
                    <input class="input100" type="text" name="fullname" required>
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Email
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
                    <input class="input100" type="email" name="email" required>
                    <span class="focus-input100"></span>
                </div>

                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-12"  data-validate = "Password is required">
                    <input class="input100" type="password" name="password" required>
                    <span class="focus-input100"></span>
                </div>
                <?php if(isset($_GET['pass_verify']) && $_GET['pass_verify'] == 0): ?>
                    <div class="alert alert-danger" role="alert">
                        The password is easy. <br>
                        - The password must be at least 8 characters long. <br>
                        - At least 1 capital letter. <br>
                        - At least 1 uppercase letter. <br>
                        - At least 1 digit.
                    </div>
                <?php endif;?>
                <div class="container-login100-form-btn ">
                    <button class="login100-form-btn">
                        Create account
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

