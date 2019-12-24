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

                <h3>All Subject</h3>
                <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                    <a class="btn btn-success" href="{{ url('/students') }}">Students</a>
                    <a class="btn btn-success" href="{{ url('/subjects/add-subject') }}">Add New</a>
                </div>

            </div>
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="text-center">
                            <tr>
                                <th width="10%">SL</th>
                                <th width="10%">Name</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->id}}</td>
                                    <td>{{$subject->name}}</td>
                                    <td>
                                        <a style="float: left; margin-left: 2px;" href="{{ url('/subjects/edit-subject/'.$subject->id) }}" class="btn btn-primary">Edit</a>
                                        <form style="float: left; margin-left: 2px;" action="{{ url('/subjects/delete-subject/'.$subject->id)}}" method="post">
                                            @csrf

                                            <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! $subjects->links() !!}
    </div>

@endsection

