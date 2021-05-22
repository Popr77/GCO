<!-- Initial Message -->

<div class="container-fluid welcome-message">
    <div class="row justify-content-center align-items-center h-100">
        <div class="text-center col-lg-6 col-md-8 col-sm-10 col-12">
            <h1>Learn today, teach tomorrow</h1>
            <h5 class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cupiditate deleniti labore laudantium quae quia quod recusandae rem repellendus unde. Accusamus ea impedit incidunt iusto laboriosam omnis quia reprehenderit, sunt.</h5>
        </div>
    </div>
</div>

<!-- Recommended courses -->

<div class="container-fluid py-5">
    <div class="row justify-content-center align-items-center h-100">
        <div class="text-center col-lg-6 col-md-8 col-sm-10 col-12">
            <h1>Recommended Courses</h1>
            <h5 class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci cupiditate deleniti labore laudantium quae quia quod recusandae rem repellendus unde. Accusamus ea impedit incidunt iusto laboriosam omnis quia reprehenderit, sunt.</h5>
        </div>
    </div>
</div>

<!-- Cards -->
{{-- style="display: flex; flex-direction: row; justify-content: center; padding-bottom: 50px" --}}
<div class="container pb-5">
    <course-list :num-courses="3" user-id="{{ auth()->check() ? stringValue(auth()->user()->id) : null }}"/>
</div>


<!-- Join us -->

<div class="container-fluid col-lg-12" style="background-color: whitesmoke; border: none">
    <div class="row" style="font-family: Poppins; display: flex; justify-content: center">
        <div style="margin: 50px; text-align: center">
            <h1>Join Us</h1>
            <h5 style="text-align: center; margin-top: 30px">Learning keeps you ahead. Acquire new skills that will impress everyone.</h5>
            <a href="#" class="btn btn-primary" style="margin-top: 50px">Get Started</a>
        </div>
    </div>
</div>
