<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Login</h1>
                    <form >
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" id="email" class="form-control" placeholder="example@example.com">
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password"  id="password" class="form-control" placeholder="Enter Password">
                        </div> 
                        <div class="justify-content-between d-flex">
                        <button onclick="login()" class="btn btn-primary mt-2">Login</button>
                          
                        </div>
                        <a href="forgot-password.html" class="mt-3">Forgot Password?</a>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Do not have an account? <a  href="{{url('/userRegistration')}}">Register</a></p>
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>

<script>
    async function login(){
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            errorToast('Email is required');
        } else if (password.length === 0) {
            errorToast('Password is required');
        } else {
            try {
                let res = await axios.post('/user-signin', {
                    email: email,
                    password: password
                });

                if(res.status===200 && res.data['status']==='success'){
                    successToast(res.data['message']);
                    window.location.href="/";
                }
                else{
                    errorToast(res.data['message']);
                }
            } catch (err) {
                errorToast('User Email or Password Not Match');
            }
        }
    }
</script>
