@extends('master.dashboard.main')

@section('content')
    <dashboard-header title="Dashboard"></dashboard-header>

    <div class="row">
        @component('components.dashboard.stats', ['stats' => $stats])
        @endcomponent
    </div>

    <div class="row mt-3">
        <div class="col-xl-6 p-2 rounded">
            <h2>Feedbacks to Approve</h2>
            @component('components.dashboard.feedbacks-to-approve-table', compact('feedbacksToApprove'))
            @endcomponent
        </div>

    </div>


@endsection

@section('styles')
    <style>
        .stat-result {
            font-size: 3rem;
            font-weight: bold;
            line-height: 3rem;
        }

        i {
            font-size: 3rem;
        }

        .circle {
            background-color: rgba(115, 176, 255, 0.1);
            padding: 20px;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            position: absolute;
            top: -86px;
            left: -100px;
        }

        .circle i {
            position: absolute;
            bottom: 30px;
            right: 35px;
            transform: rotate(20deg);
        }

        td {
            cursor: pointer;
        }

        /*.tableFixHead          { overflow: auto; height: 300px; }*/
        /*.tableFixHead thead th { position: sticky; top: 0; z-index: 1; }*/

        /*!* Just common table stuff. Really. *!*/
        /*table  { border-collapse: collapse; width: 100%; }*/
        /*th, td { padding: 8px 16px; }*/
        /*th {*/
        /*    color: var(--white);*/
        /*    background-color: var(--primary);*/
        /*    border-top: 0 !important;*/
        /*}*/

        thead {
            box-sizing: border-box;
            border: 3px solid var(--primary);
        }

        thead, tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        thead tr th {
            background-color: var(--primary);
            color: var(--white);
        }

        tbody {
            display: block;
            overflow-y: auto;
            table-layout: fixed;
            max-height: 200px;
        }

        .feedbacks-card {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        @media (min-width: 1750px) {
            .stat {
                flex: 0 0 25%;
            }
        }
    </style>
@endsection

@section('scripts')
    <script>
        $('#feedbackModal').on('show.bs.modal', function (event) {
            let tr = $(event.relatedTarget)
            let feedback = tr.data('feedback')
            let username = tr.data('feedback-username')
            let coursename = tr.data('feedback-coursename')
            let modal = $(this)

            modal.find('.enrollmentid').text(feedback.id)
            modal.find('.userid').text(feedback.user_id)
            modal.find('.username').text(username)
            modal.find('.courseid').text(feedback.course_id)
            modal.find('.coursename').text(coursename)
            modal.find('.rating').text(feedback.feedback_stars)
            // modal.find('.rating')[0].__vue__.selectedRating = feedback.feedback_stars
            modal.find('.comment').text(feedback.feedback_comment)
            modal.find('.date').text(new Date(feedback.updated_at).toLocaleString('pt-PT'))
        })

        $('#approvalForm').submit(function (e) {
            e.preventDefault()
            $('#approved').val(e.originalEvent.submitter.id === 'btn-approve' ? true : '');
            $('#enrollment').val($('#feedbackModal').find('.enrollmentid').text())

            e.target.submit()
        })
    </script>
@endsection
