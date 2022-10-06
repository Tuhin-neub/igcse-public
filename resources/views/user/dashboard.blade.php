@extends('website.layouts.app')
@section('contents')
<div class="container">
    <h3 class="text-center font-weight-normal">Student Dashboard</h3>
    <hr>
    <div class="row">
        @include('user.layouts.sidebar')
        <div class="col-md-8 col-lg-8">
            <div class="right-section">
                <div class="card-deck text-center">
                    <div class="card bg-success text-light">
                        <div class="card-body">
                            <h5 class="card-title">Chapter Completed</h5>
                            <p class="card-text num_of_chapter"></p>
                        </div>
                    </div>
                    <div class="card bg-primary text-light">
                        <div class="card-body">
                            <h5 class="card-title">lecture Completed</h5>
                            <p class="card-text num_of_lecture"></p>
                        </div>
                    </div>
                    <div class="card bg-info text-light">
                        <div class="card-body">
                            <h5 class="card-title">Obtained Marks</h5>
                            <p class="card-text num_of_obtain">0</p>
                        </div>
                    </div>
                </div>

                <!--Table Start-->
                <table class="table table-bordered mt-4 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Chapter</th>
                            <th scope="col">Lecture</th>
                            <th scope="col">Quiz</th>
                            <th scope="col">Point</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    @php
                        $chapter_array = array();
                        $lecture_array = array();
                    @endphp
                    <tbody>
                        @foreach ($results as $result)
                            <tr>
                                @if (!in_array($result->lecture->chapter->id, $chapter_array))
                                    @php
                                        array_push($chapter_array,$result->lecture->chapter->id);
                                    @endphp
                                @endif
                                @if (!in_array($result->lecture->id, $lecture_array))
                                    @php
                                        array_push($lecture_array,$result->lecture->id);
                                    @endphp
                                @endif
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td>{{ $result->lecture->chapter->title }}</td>
                                <td>{{ $result->lecture->title }}</td>
                                <td>{{ $result->total_correct }}/{{ $result->total_correct + $result->total_wrong }}</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-links')
<script>
    $( document ).ready(function() {
        $('.num_of_chapter').text("{{ count($chapter_array) }}");
        $('.num_of_lecture').text("{{ count($lecture_array) }}");
        $('.num_of_obtain').text("0");
    });
</script>
@endsection