@if(auth()->check() && $feedbacks->where('user_id', auth()->user()->id)->count() > 0)
    <div class="row text-light">
        <div class="col-12 d-flex align-items-center">
            <div class="user-img mr-2 shadow-sm" style="background-image: url({{ asset('storage/img/users/' . auth()->user()->userData->photo) }})"></div>
            <div>
                <p class="mb-0 font-weight-bold">
                    {{ auth()->user()->userData->name }}
                </p>
                <star-rating :increment="0.1"
                             :star-size="20"
                             read-only
                             :show-rating="false"
                             :inline="true"
                             class="mb-1"
                             :rating="{{ $feedbacks->where('user_id', auth()->user()->id)->first()->feedback_stars }}"></star-rating>
            </div>
        </div>
        <div class="col-12 mt-2">
            <p class="mb-0">{{ $feedbacks->where('user_id', auth()->user()->id)->first()->feedback_comment }}</p>
        </div>
    </div>
    <hr>
@endif
@foreach($feedbacks->where('user_id', '<>', auth()->user()->id ?? '') as $feedback)
    <div class="row text-light">
        <div class="col-12 d-flex align-items-center">
            <div class="user-img mr-2" style="background-image: url({{ asset('storage/img/users/logo.jpg') }})"></div>
            <div>
                <p class="mb-0 font-weight-bold">
                    {{ $feedback->user->userData->name }}
                </p>
                <star-rating :increment="0.1"
                             :star-size="20"
                             read-only
                             :show-rating="false"
                             :inline="true"
                             class="mb-1"
                             :rating="{{ $feedback->feedback_stars }}"></star-rating>
            </div>
        </div>
        <div class="col-12 mt-2">
            <p class="mb-0">{{ $feedback->feedback_comment }}</p>
        </div>
    </div>
    @if(!$loop->last)
        <hr>
    @endif
@endforeach
@if($feedbacks->count() < 1)
    <div class="row text-light text-center">
        <div class="col-12">
            <i class="bi bi-emoji-frown" style="font-size: 2rem;"></i>
            <p class="text-center">No feedbacks yet...</p>
        </div>
    </div>
@endif
