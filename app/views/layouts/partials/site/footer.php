<footer class="footer">
        <div class="container py-4">
            <div class="row py-5">
                <div class="col col-md-4 mb-3">
                    <h3>Services</h3>
                    <ul class="list-unstyled">
                        <li class='footer-link'>Help</li>
                        <li class='footer-link'>Contact</li>
                        <li class='footer-link'>Online chat</li>
                        <li class='footer-link'>Terms</li>

                    </ul>

                </div>
                <div class="col col-md-4 mb-3">
                    <h3>Company</h3>
                    <ul class="list-unstyled">
                        <li class='footer-link'>What we do</li>
                        <li class='footer-link'>Available Services</li>
                        <li class='footer-link'>Latest Posts</li>
                        <li class='footer-link'>FAQs</li>

                    </ul>

                </div>        
                <div class="col col-md-4 mb-3">
                    <h3>Social media</h3>
                    <ul class="list-unstyled">
                        
                        <li class='footer-link social-twitter'><i class="fab fa-twitter"></i>Twitter</li>
                        <li class='footer-link social-facebook'><i class="fab fa-facebook"></i>Facebook</li>
                        <li class='footer-link social-instagram'><i class="fab fa-instagram"></i>Instagram</li>
                        <li class='footer-link social-google'><i class="fab fa-google-plus"></i>Google</li>

                    </ul>

                </div>            
            </div>
            <div class="border-top pt-4 row">
                <div class="col col-md-6">
                    <p>&COPY; 2020 All right reserved.</p>
                </div>
                <div class="col col-md-6">
                    <p>&COPY; 2020 All right reserved.</p>
                </div>                
            </div>    
        </div>
    </footer>
    <div class="modal" id="login">
        <div class="dialog">
            <a href="#close" title="close login window" class="close">&times;</a>
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome back</h2>
                    <p>Create your account,<br>It's Totally free</p>
                    <a href="/#register" class="btn">Sign Up</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Sign in</h2>
                    <form method="POST" action="/login">
                        <p>
                            <label>Email<span>*</span></label>
                            <input type="email" name="email" placeholder='Username or email' required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" name="password" placeholder='Password' required>
                        </p>
                        <p>
                            <input type="submit" value="Sign in">
                        </p>
                        <p>
                            <a href="#">Forget Password?</a>
                        </p>

                    </form>
                </div>
            </div>
        </div>


    </div>
    <div class="modal" id="register">
        <div class="dialog">
            <a href="#cancel" title="close login window" class="close">&times;</a>
            <div class="col-left">
                <div class="login-text">
                    <h2>Create Account</h2>
                    <p>Have account?</p>
                    <a href="/#login" class="btn">Sign in</a>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Sign up</h2>
                    <form method="POST" action="/register">
                        <p>
                            <label for="">Email adress<span>*</span></label>
                            <input type="email" name='email' placeholder='Email' required>
                        </p>
                        <p>
                            <label for="">Password<span>*</span></label>
                            <input type="password" name='password' placeholder='Password' required>
                        </p>
                        <p>
                            <label for="">Confirm Password<span>*</span></label>
                            <input type="password"name='confirmpassword' placeholder='Retype Password Again' required>
                        </p>
                        <p>
                            <input type="submit" value="Sign up">
                        </p>

                    </form>
                </div>
            </div>
        </div>


    </div>