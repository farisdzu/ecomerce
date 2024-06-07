@extends('layouts.template')

@section('page-title')
Detail {{$user->name}}
@endsection



@section('content')

@if ($errors->any())
<div class="alert alert-danger alert-dimissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true>&times;">x</button>
    <h5><i class="icon fas fa-ban"></i>sorry, error</h5>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>  
@endif

{{-- area detail pemilik toko --}}
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">

                <div class="card-title">
                    <h5>Data Penjual id {{$user->id}} </h5>
                </div>
                <div class="card-tools">
                    <span title="3 New Messages" class="badge badge-primary">3</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless">

                        <tr>
                            <th>Nama User (Pemilik toko)</th>
                            <td> : </td>
                            <td> {{$user->name}} </td>
                        </tr>
                        <tr>
                            <th>Email User (Pemilik toko)</th>
                            <td> : </td>
                            <td> {{$user->email}} </td>
                        </tr>
                    </table>
                </div>
            </div>


        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{route('penjual.update',$user->id)}}" method="post">
                    @csrf
                    {{method_field('PUT')}}

                    <form-group>
                        <label>Nama Penjual</label>
                        <input type="text" name="name" value="{{$user->name}}" required class="form-control">
                    </form-group>
                    <form-group>
                        <label>Alamat email</label>
                        <input type="email" name="email" value="{{$user->email}}" required class="form-control">
                        <input type="text" name="level" hidden value="penjual">
                    </form-group>
                    <form-group>
                        <label>Kata sandi</label>
                        <input type="password" name="password"  class="form-control"
                            placeholder="Minimal 8 karakter">
                    </form-group>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
