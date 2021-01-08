<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="post" action="">
					<span class="login100-form-title p-b-32">
						Password recovery
					</span>
                <?php if(isset($data['token'])): ?>
                    <span class="txt1 p-b-11">
						Link to restore
					</span>
                  <div class="wrap-input100 validate-input m-b-36">
                      <p style="display: block; padding: 10px; margin: 10px;"><a href="/admin/main/newpass?token=<?= $data['token']?>">Link</a></p>
                  </div>
                <?php endif;?>
                <span class="txt1 p-b-11">
						Email
					</span>
                <div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
                    <input class="input100" type="email" name="email" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        To send a letter
                    </button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>

