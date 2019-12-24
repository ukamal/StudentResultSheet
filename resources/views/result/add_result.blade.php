@extends('parent')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3>Add Result for {{ $student->name }}</h3>
                    <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                        <a class="btn btn-primary" href="{{ url('/students') }}">Student List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <form action="{{ route('student.result.create', $student->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Subject</label>
                                    <select class="form-control select2-single" required name="subject_id" required>
                                        <option disabled selected hidden>Select</option>
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="marks">Mark</label>
                                    <input class="form-control" type="number" required name="marks" id="marks">

                                </div>
                                <button class="btn btn-primary" type="submit">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

