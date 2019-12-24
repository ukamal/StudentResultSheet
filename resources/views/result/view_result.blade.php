@extends('parent')

@section('content')

    <div class="row justify-content-center">
        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="col-md-12">
            <div class="card-header">

                <h3>View Result</h3>
                <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                    <a class="btn btn-primary" href="{{ url('/students') }}">Student List <i class="fas fa-plus"></i></a>
                </div>

            </div>
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="name">Name: {{ $student->name }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="class">Class: {{ $student->class }}</label>
                                </div>
                                <div class="col-md-3">
                                    <label for="roll">Roll: {{ $student->roll }}</label>
                                </div>
                                <div class="col-md-3">
                                    @if($student->cgpa)
                                        <label for="cgpa">CGPA: {{ $student->getCgpa($student->cgpa) }} ({{ $student->cgpa }}%)</label>
                                    @else
                                        <label for="cgpa">CGPA: </label>
                                    @endif
                                </div>
                            </div><br/><br/>

                        <table class="table table-striped table-hover table-bordered">
                            <thead class="text-center">
                                <tr>
                                    <th width="10%">SL</th>
                                    <th width="10%">Subject</th>
                                    <th width="10%">Marks</th>
                                    <th width="10%">GPA</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($student->results as $key=> $result)
                                    <tr>

                                        <td> {{ ++$key }} </td>
                                        <td> {{ $result->subject->name }} </td>
                                        <td> {{ $result->marks }} </td>
                                        <td> {{ $result->grade }} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

@endsection

