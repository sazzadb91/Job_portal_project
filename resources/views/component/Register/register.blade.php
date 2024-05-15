<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                        </div> 
                        <div class="mb-3">
                            <label for="email" class="mb-2">Email*</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                        </div> 
                        <div class="mb-3">
                            <label for="password" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                        </div> 
                        <div class="mb-3">
                            <label for="confirm_password" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password">
                        </div> 
                        <button type="button" onclick="Save()" class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a href="{{ url('/login') }}">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    async function Save(){
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let confirm_password = document.getElementById('confirm_password').value;

        if (name.length === 0) {
            errorToast('Please enter name');
        } else if (email.length === 0) {
            errorToast('Email required');
        } else if (password.length === 0) {
            errorToast('Password required');
        } else if (confirm_password.length === 0) {
            errorToast('Confirm Password required');
        } else if (password !== confirm_password) {
            errorToast('Passwords do not match');
        } else {
            try {
                let res = await axios.post('/user-login', {
                    name: name,
                    email: email,
                    password: password,
                });

                if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                setTimeout(function (){
                    window.location.href='/login'
                },2000)
            }
            else{
                errorToast(res.data['message'])
            }
            } catch (error) {
                console.error(error);
                errorToast('An error occurred while processing your request.');
            }
        }
    }
</script>
