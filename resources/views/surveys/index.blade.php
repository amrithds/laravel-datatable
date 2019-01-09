@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Surveys
                        <a href="{{ route('surveys.create') }}" class="btn btn-primary float-right">Create Survey</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table table-bordered" id="surveys-table" width="100%">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="ModalUsers" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title"></h3>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered responsive" id="surveys-table" >
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@stop

@push('scripts')
    <script>
        $(function () {
            $('#surveys-table').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: true,
                ajax: '{!! route('surveys.data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action'}
                ]
            });

            $('#surveys-table tbody').on('click', '.delete-survey-button', function () {
                if (confirm('Are You sure?')) {
                    $('.delete-survey-form').submit();
                }
            });



            $('#surveys-table tbody').on('click', '.btn-show-users', function () {
                $('#ModalUsers').modal("show");

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: '{!! route('surveys.users') !!}', //Relative or absolute path to response.php file
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": $(this).data('id')
                    },
                    success: function (data) {
                        $('#ModalUsers .modal-body tbody').html('');
                        data.forEach(function(user){
                            $('#ModalUsers .modal-body tbody').append('<tr><td>'+user.id+'</td>'
                                +'<td>'+user.name+'</td>'
                                +'<td>'+user.email+'</td>'
                                +'</tr>');
                        });
                    }
                });

            });

        });
    </script>
@endpush