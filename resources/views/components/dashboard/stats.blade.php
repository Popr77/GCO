@foreach($stats as $stat)
<div class="col-lg-6 p-2 stat">
    <div class="col-12 card shadow-sm pl-0">
        <div class="d-flex no-gutters justify-content-end align-items-center py-2 position-relative overflow-hidden">
            <div class="circle shadow-sm">
                <i class="{{ $stat['icon'] }} text-primary"></i>
            </div>
            <div class="col-12 col-xl-6 d-flex flex-column justify-content-center align-items-end text-right">
                <p class="stat-result mb-0 text-primary">{{ $stat['value'] }}</p>
                <h5 class="card-title text-danger mb-0 font-weight-bold">{{ $stat['name'] }}</h5>
                <p class="text-dark mb-0">{{ $stat['time'] }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach
