@extends('parent')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <div class="card">
                <div class="card-header">
                    <h3>Create Students</h3>
                    <div class="card-tools" style="position: absolute;right: 1rem;top: .5rem;">
                        <a class="btn btn-primary" href="{{ url('/subjects') }}">Student List</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <form action="{{ url('/subjects/edit-subject/'.$subjects->id) }}" method="post">

                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" required name="name" id="name" value="{{$subjects->name}}">

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

