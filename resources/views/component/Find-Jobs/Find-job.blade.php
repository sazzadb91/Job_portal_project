<section class="section-3 py-5 bg-2 ">
    <div class="container">     
        <div class="row">
            <div class="col-6 col-md-10 ">
                <h2>Find Jobs</h2>  
            </div>
            <div class="col-6 col-md-2">
                <div class="align-end">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Latest</option>
                        <option value="">Oldest</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-md-4 col-lg-3 sidebar mb-4">
                <form action=""  >
              
                <div class="card border-0 shadow p-4">
                    <div class="mb-4">
                        <h2>Keywords</h2>
                        <input type="text" placeholder="Keywords" name="keyword" id="keyword" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Location</h2>
                        <input type="text" name="location" id="location" placeholder="Location" class="form-control">
                    </div>

                    <div class="mb-4">
                        <h2>Category</h2>
                        <select name="category" id="jobcategory" class="form-control">
                            <option value="">Select a Category</option>                          
                        </select>
                    </div>                   

                    <div class="mb-4">
                        <h2>Job Type</h2>
                        @foreach ( $jobtype as $jobtypeitem)               
                        <div class="form-check mb-2"> 
                            <input class="form-check-input " name="jobtype" id="jobtype" type="checkbox" value="{{$jobtypeitem->id}}" id="jobtype-id-{{$jobtypeitem->id}}">    
                            <label for="jobtype-id-{{$jobtypeitem->id}}" class="form-check-label" for="">{{$jobtypeitem->name}}</label>
                        </div>
                            
                        @endforeach
                                     

                    </div>

                    <div class="mb-4">
                        <h2>Experience</h2>
                        <select name="experience" id="experience" class="form-control">
                            <option value="">Select Experience</option>
                            <option value="">1 Year</option>
                            <option value="">2 Years</option>
                            <option value="">3 Years</option>
                            <option value="">4 Years</option>
                            <option value="">5 Years</option>
                            <option value="">6 Years</option>
                            <option value="">7 Years</option>
                            <option value="">8 Years</option>
                            <option value="">9 Years</option>
                            <option value="">10 Years</option>
                            <option value="">10+ Years</option>
                        </select>
                    </div>  
                    <button type="submit" name="jobsearch" id="jobsearch" class="btn btn-primary">search</button>                  
                </div>
            </form>
            </div>
            <div class="col-md-8 col-lg-9 ">
                <div class="job_listing_area">                    
                    <div class="job_lists">
                    <div class="row">

                        @foreach ($jobs as $joball )
                            
                        <div class="col-md-4">
                            <div class="card border-0 p-3 shadow mb-4">
                                <div class="card-body">
                                    <h3 class="border-0 fs-5 pb-2 mb-0">{{ $joball->title }}</h3>
                                    <p>{{ Str::words($joball->description, 10) }}</p>
                                    <div class="bg-light p-3 border">
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-map-marker"></i></span>
                                            <span class="ps-1">Location: {{$joball->location}}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-clock-o"></i></span>
                                            <span class="ps-1">JobType: {{$joball->jobtype->name  }}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fa fa-usd"></i></span>
                                            <span class="ps-1">salary: {{$joball->salary}}</span>
                                        </p>
                                        <p class="mb-0">
                                            <span class="fw-bolder"><i class="fas fa-calendar-alt"></i></span>
                                            <span class="ps-1">Experience: {{$joball->experience}}</span>
                                        </p>
                                    </div>

                                    <div class="d-grid mt-3">
                                        <a href="{{ url('/job-detail',$joball->id)}}" class="btn btn-primary btn-lg">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<script>


        FillCategoryDropDown();
async function FillCategoryDropDown(){
    let res = await axios.get("/list-category")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#jobcategory").append(option);
    })
}


 $("#jobsearch").submit(function (e) {
     e.preventDefault();
     url = "{{url('/find-job')}}?";
     var keyword= $("#keyword").val();
     var category= $("#jobcategory").val();
     var location= $("#location").val();
     var jobtype= $("#jobtype").val();
     var experience= $("#experience").val();
     if(keyword!=""){
         url+="&keyword="+keyword;
     }
     if(category!=""){
         url+="&category="+category;
     }
     if(location!=""){
         url+="&location="+location;
     }
     if(jobtype!=""){
         url+="&jobtype="+jobtype;
     }
     if(experience!=""){
         url+="&experience="+experience;
     }

     window.location.href=url;

 });
</script>