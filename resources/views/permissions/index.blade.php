@extends('layouts.app')
@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title text-center">User Permissions</h3>

                        @can('permission-create')
                            <a class="float-right mr-4 btn btn-success" href="{{ route('permissions.create') }}"><strong>Add
                                    Permission</strong></a>
                        @endcan

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="myTable">
                            @php
                                $i = 0;
                            @endphp
                            @can('role-list')
                                @foreach ($permissions as $permission)
                                    <tr role="row" class="odd">
                                        <td width="20% " scope="row">{{ ++$i }}</td>
                                        <td width="20%">{{ $permission->name }}</td>
                                        <td width="30%">
                                            @can('permission-edit')
                                                <a href="#" class="btn btn-info btn-sm mr-2">
                                                    <i class="fa fa-eye" aria-hidden="true">
                                                        Show
                                                    </i>
                                                </a>
                                            @endcan

                                            @can('permission-edit')
                                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary btn-sm mr-2">
                                                    <i class="fa fa-edit" aria-hidden="true">
                                                        Edit
                                                    </i>
                                                </a>
                                            @endcan

                                            @can('permission-delete')
                                                <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                      method="post" class="d-inline-block">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm mr-2">
                                                        <i class="fa fa-trash" aria-hidden="true">
                                                            Delete
                                                        </i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @endcan
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
@endsection
