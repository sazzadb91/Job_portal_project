<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-5">
            @foreach ( $category as $itemcategory)
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory">
                    <a href="jobs.html"><h4 class="pb-2">{{ $itemcategory->name }}</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            @endforeach
          
        </div>
    </div>
</section>