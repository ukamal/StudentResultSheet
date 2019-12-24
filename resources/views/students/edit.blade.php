@extends('parent')

@section('content')

    <div class="row justify-content-center">
        @if($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="col-md-8 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3>Create Students</h3>
                    <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                        <a class="btn btn-primary" href="{{ url('/students') }}">Student List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <form action="{{ url('/students/edit/'.$students->id) }}" method="post">

                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" required name="name" id="name" value="{{$students->name}}">

                                </div>
                                <div class="form-group">
                                    <label for="name">Class</label>
                                    <input class="form-control" type="text" required name="class" id="class" value="{{$students->class}}">

                                </div>
                                <div class="form-group">
                                    <label for="name">Roll</label>
                                    <input class="form-control" type="text" required name="roll" id="roll" value="{{$students->roll}}">

                                </div>
                                <button class="btn btn-primary" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

