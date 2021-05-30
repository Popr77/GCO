<div class="card shadow-sm overflow-hidden feedbacks-card">
    <table class="table table-hover m-0 text-center">
        <thead class="shadow">
        <tr>
            <th class="shadow-sm w-25">User ID</th>
            <th class="shadow-sm w-50">Course Name</th>
            <th class="shadow-sm w-25">Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse($feedbacksToApprove as $feedback)
            <tr class="feedback-row"
                data-toggle="modal"
                data-target=".bd-example-modal-lg"
                data-feedback="{{ $feedback }}"
                data-feedback-username="{{ $feedback->user->userData->name }}"
                data-feedback-coursename="{{ $feedback->course->name }}">
                <td class="w-25">{{ $feedback->user_id }}</td>
                <td class="w-50">{{ $feedback->course->name }}</td>
                <td class="w-25">{{ $feedback->updated_at }}</td>
            </tr>
        @empty
            <tr class="feedback-row text-center">
                <td class="pt-4"><p>No feedbacks waiting for approval...</p></td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Feedback</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="d-none enrollmentid"></p>
                    <p><span class="text-primary font-weight-bold">User ID: </span><span class="userid"></span></p>
                    <p><span class="text-primary font-weight-bold">User Name: </span><span class="username"></span></p>
                    <hr>
                    <p><span class="text-primary font-weight-bold">Course ID: </span><span class="courseid"></span></p>
                    <p><span class="text-primary font-weight-bold">Course Name: </span><span class="coursename"></span></p>
                    <hr>
                    <p><span class="text-primary font-weight-bold">Rating: </span>
                        <span class="rating"></span>
{{--                        <star-rating--}}
{{--                            :increment="0.5"--}}
{{--                            :star-size="20"--}}
{{--                            :inline="true"--}}
{{--                            :show-rating="false"--}}
{{--                            class="rating"></star-rating>--}}
                    </p>
                    <p><span class="text-primary font-weight-bold">Comment: </span></p>
                    <p class="comment"></p>
                    <p><span class="text-primary font-weight-bold">Date: </span><span class="date"></span></p>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('feedbackApproval') }}" method="POST" id="approvalForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="approved" name="approved" value="">
                        <input type="hidden" id="enrollment" name="enrollment" value="">
                        <button type="submit" id="btn-decline" class="btn btn-danger font-weight-bold">Decline</button>
                        <button type="submit" id="btn-approve" class="btn btn-success font-weight-bold">Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


