<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <?php if(isset($_GET['token'])): ?>
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="/admin/main/newpass">
					<span class="login100-form-title p-b-32">
						Input new password
					</span>
                <span class="txt1 p-b-11">
						Password
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                    <input class="input100" type="password" name="password" required>
                    <span class="focus-input100"></span>
                </div>
                <input type="hidden" name="token" value="<?php if(isset($_GET['token'])) echo $_GET['token']?>">
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Restore
                    </button>
                </div>
                <br>
            </form>
            <?php else: ?>
                <div class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						The page is not available
					</span>

                    <br>
                </div>

            <?php endif;?>
        </div>
    </div>
</div>

