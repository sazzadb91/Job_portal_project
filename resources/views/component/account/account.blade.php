<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        {{-- <img src="assets/assets/images/avatar7.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;"> --}}
                        <h5 class="mt-3 pb-0">Mohit Singh</h5>
                        <p class="text-muted mb-1 fs-6">Full Stack Developer</p>
                        <div class="d-flex justify-content-center mb-2">
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="btn btn-primary">Change Profile Picture</button>
                        </div>
                    </div>
                </div>
                <div class="card account-nav border-0 shadow mb-4 mb-lg-0">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush ">
                            <li class="list-group-item d-flex justify-content-between p-3">
                                <a href="{{ url('/account') }}">Account Settings</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ url('job-post') }}">Post a Job</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ url('my-job') }}">My Jobs</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ url('/applied-job') }}">Jobs Applied</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ url('') }}">Saved Jobs</a>
                            </li>                                                        
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4">
                    <div class="card-body  p-4">
                     <form >
                        <h3 class="fs-4 mb-1">My Profile</h3>   
                        <div class="mb-4">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" placeholder="Enter Name" id="name" class="form-control" >
                            <input type="hidden" placeholder="Enter Name" id="id" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" readonly placeholder="Enter Email" id="email" class="form-control" >
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Designation*</label>
                            <input type="text" placeholder="Designation" id="designation" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Mobile*</label>
                            <input type="number" id="mobile" placeholder="Mobile" class="form-control">
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="button" onclick="update()" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
                <div class="card border-0 shadow mb-4">
                    <div class="card-body p-4">
                        <h3 class="fs-4 mb-1">Change Password</h3>
                        <div class="mb-4">
                            <label for="" class="mb-2">Old Password*</label>
                            <input type="password" placeholder="Old Password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">New Password*</label>
                            <input type="password" placeholder="New Password" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" placeholder="Confirm Password" class="form-control">
                        </div>                        
                    </div>
                    <div class="card-footer  p-4">
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title pb-0" id="exampleModalLabel">Change Profile Picture</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="save-form">
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" id="img"  name="img">
              </div>
              <div class="d-flex justify-content-end">
                  <button  onclick="updatephoto()" class="btn btn-primary mx-3">Update</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
              
          </form>
        </div>
      </div>
    </div>
  </div>
<script>

      FillUpDataForm();
   async function FillUpDataForm(){
       let res = await axios.get('/list-profile');
            let data = res.data['data'];
            if(res.status===200 && res.data['status']==='success'){
            let data = res.data['data'];
            document.getElementById('name').value= data['name'];
            document.getElementById('email').value= data['email'];        
            document.getElementById('designation').value= data['designation'];        
            document.getElementById('mobile').value= data['mobile'];        
                
        }
        else{
            errorToast(res.data['message']);
        }
      
   }



    async function update(){
     
        let name = document.getElementById('name').value;
        let mobile = document.getElementById('mobile').value;
        let designation = document.getElementById('designation').value;
     

      
        if(mobile.length==0){
            errorToast("Mobile is required");
        }
       else if(name.length==0){
            errorToast("Mobile is required");
        }
        else if(designation.length==0){
            errorToast("Designation is required");
        }else{
           
            let res = await axios.post('/profile-update',{
                name:name,
                mobile:mobile,
                designation:designation
            })
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
               
            }
            else{
                errorToast(res.data['message'])
            }
           }
        }
        async function updatephoto() {
    let img = document.getElementById('img').files[0];
    if (!img) {
        errorToast("Image is required");
    } else {
        try {
            document.getElementById('modal-close').click();
            let formData = new FormData();
            formData.append('img', img);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }

            let res = await axios.post('/profile-photo', formData, config);
            if (res.status === 200) {
                successToast('Request completed');
                document.getElementById("save-form").reset();
            } else {
                errorToast("Request fail !");
            }
        } catch (error) {
            console.log(error.message);
            errorToast("An error occurred: " + error.message);
        }
    }
}

    
</script>