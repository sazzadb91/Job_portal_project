<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Post a Job</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="s-body text-center mt-3">
                        <img src="assets/images/mithu.png" alt="avatar"  class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="mt-3 pb-0">Sazzad Hossain</h5>
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
                                <a href="{{ url('/my-job') }}">My Jobs</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ url('/applied-job') }}">Jobs Applied</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                <a href="{{ url('/save-job') }}">Saved Jobs</a>
                            </li>                                                        
                        </ul>
                    </div>
                </div>
            </div>

           
            <div class="col-lg-9">
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">Job Details</h3>
                        <div class="row">
                            {{-- <form > --}}
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Title<span class="req">*</span></label>
                                <input type="text" placeholder="Job Title" id="title" name="title" class="form-control">
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Category<span class="req">*</span></label>
                                <select type="text" name="category"  id="jobcategory" class="form-control">
                                    <option >Select a Category</option>
                                   
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Job Nature<span class="req">*</span></label>
                                <select  type="text" class="form-select" id="jobtypelist">
                                    <option >Select a Category</option>
                                </select>
                            </div>
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Vacancy<span class="req">*</span></label>
                                <input type="number" min="1" placeholder="Vacancy" id="vacancy" name="vacancy" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Salary</label>
                                <input type="text" placeholder="Salary" id="salary" name="salary" class="form-control">
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location<span class="req">*</span></label>
                                <input type="text" placeholder="location" id="location" name="Location" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="" class="mb-2">Experience<span class="req">*</span></label>
                            <input type="text" placeholder="Job experience" id="experience" name="experience" class="form-control">
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Description<span class="req">*</span></label>
                            <textarea class="form-control" name="description" id="description" cols="5" rows="5" placeholder="Description"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Benefits</label>
                            <textarea class="form-control" name="benefits" id="benefits" cols="5" rows="5" placeholder="Benefits"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Responsibility</label>
                            <textarea class="form-control" name="responsibility" id="responsibility" cols="5" rows="5" placeholder="Responsibility"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Qualifications</label>
                            <textarea class="form-control" name="qualifications" id="qualifications" cols="5" rows="5" placeholder="Qualifications"></textarea>
                        </div>
                        
                        

                        <div class="mb-4">
                            <label for="" class="mb-2">Keywords<span class="req">*</span></label>
                            <input type="text" placeholder="keywords" id="keywords" name="keywords" class="form-control">
                        </div>

                        <h3 class="fs-4 mb-1 mt-5 border-top pt-5">Company Details</h3>

                        <div class="row">
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" placeholder="Company Name" id="company_name" name="company_name" class="form-control">
                            </div>

                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Location</label>
                                <input type="text" placeholder="Location" id="company_location" name="location" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="" class="mb-2">Website</label>
                            <input type="text" placeholder="Website" id="website" name="website" class="form-control">
                        </div>
                    </div> 
                    <div class="card-footer  p-4">
                        <button type="submit" onclick="Save()" class="btn btn-primary">Save Job</button>
                    </div>      
                {{-- </form>          --}}
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
          <form>
              <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" id="image"  name="image">
              </div>
              <div class="d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mx-3">Update</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    
    FillCategoryDropDown();
async function FillCategoryDropDown(){
    let res = await axios.get("/list-category")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#jobcategory").append(option);
    })
}
    FillCategoryDropDown1();
async function FillCategoryDropDown1(){
    let res = await axios.get("/list-jobtype")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#jobtypelist").append(option);
    })
}

    async function Save(){
        let title = document.getElementById("title").value;
        let category_id = document.getElementById("jobcategory").value;
        let jobtype_id = document.getElementById("jobtypelist").value;
        let vacancy = document.getElementById("vacancy").value;
        let salary = document.getElementById("salary").value;
        let location = document.getElementById("location").value;
        let description = document.getElementById("description").value;
        let benefits = document.getElementById("benefits").value;
        let responsibility = document.getElementById("responsibility").value;
        let qualifications = document.getElementById("qualifications").value;
        let keywords = document.getElementById("keywords").value;
         let experience = document.getElementById("experience").value;
        let company_name = document.getElementById("company_name").value;
        let company_location = document.getElementById("company_location").value;
        let website = document.getElementById("website").value;
        if(title == "" || category_id == "" || jobtype_id == "" || vacancy == "" || salary == "" || location == "" || description == "" || benefits == "" || responsibility == "" || qualifications == "" || keywords == "" ||  company_name == "" || company_location == "" || website == ""){
            errorToast('Field Required');
        }else{
            try{
                let formData=new FormData();
            formData.append('title',title)
            formData.append('category_id',category_id)
            formData.append('jobtype_id',jobtype_id)
            formData.append('vacancy',vacancy)
            formData.append('salary',salary)
            formData.append('location',location)
            formData.append('experience',experience)
            formData.append('description',description)
            formData.append('benefits',benefits)
            formData.append('responsibility',responsibility)
            formData.append('qualifications',qualifications)
            formData.append('keywords',keywords)
            formData.append('company_name',company_name)
            formData.append('company_location',company_location)
            formData.append('website',website)

            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
                let res = await axios.post('/job-save',formData,config);
                if(res.status===201){
                    successToast(res.data.message);
                }
            }catch{
                    errorToast('Something went wrong');
                }
        }
    }

  </script>