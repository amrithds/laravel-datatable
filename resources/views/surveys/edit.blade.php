@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Create Survey
                    </div>
                    <div class="card-body">
                        <form action="{{ route('surveys.update', $survey->id) }}" method="post">
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="list-group">
                                        @foreach ($errors->all() as $error)
                                            <li class="list-group-item">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $survey->name }}">
                            </div>
                            <div class="form-group">
                                <label for="users">Select Users</label>
                                <select class="users form-control" name="users[]" multiple="multiple" style="width: 100%">
                                    @foreach($users as $user)
                                        <option {{ (in_array($user->id,$survey->users()->pluck('id')->toArray())) ? 'selected' : '' }} value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="put">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.users').select2();
        });
    </script>
@endpush
