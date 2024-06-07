@extends('layouts.template')

@section('page-title')


Toko {{$data->nama_toko}}
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


                <div class="card-title d-flex align-items-center">
                    <div class="card-image mr-2">
                        <img class="rounded-circle" width="50px" height="50px"
                            src="{{asset('storage/images/toko/'.$data->icon_toko)}}" alt="gambar ">

                    </div>
                    <h5>Toko id {{$data->id}} @if($data->status_aktif == FALSE)
                        <span class="badge badge-danger">Non Aktif</span>
                        @else
                        <span class="badge badge-success">Aktif</span>
                        @endif</h5>
                </div>
                <div class="card-tools">



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
                            <th>Nama toko</th>
                            <td> : </td>
                            <td> {{$data->nama_toko}} </td>
                            <td></td>
                        </tr>

                        <tr>
                            <th>Nama Pemilik </th>
                            <td> : </td>
                            <td> {{$data->user->name}} </td>
                        </tr>
                        <tr>
                            <th>Kategori Toko </th>
                            <td> : </td>
                            <td> {{$data->kategori_toko}} </td>
                        </tr>
                        <tr>
                            <th>Jam Operasional </th>
                            <td> : </td>
                            <td> <span class="text-success">{{$data->jam_buka}}</span> s.d <span
                                    class="text-danger">{{$data->jam_libur}}</span> </td>
                        </tr>
                        <tr>
                            <th>Hari Buka </th>
                            <td> : </td>
                            <td> {{$data->hari_buka}} </td>
                        </tr>
                        <tr>
                            <th>Deskripsi Toko </th>
                            <td> : </td>
                            <td> {!! $data->desc_toko !!} </td>
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
                <form action="{{route('toko.update',$data->id)}}" enctype="multipart/form-data"  method="post">
                    @csrf
                    {{method_field('PUT')}}

                    <div class="modal-body">
                        <form-group>
                            <label>Nama Toko</label>
                            <input type="text" name="nama_toko" value="{{ $data->nama_toko }}" required class="form-control"> 
                        </form-group>

                        

                        <div class="row justify-content-arround">
                            <div class="form-group col-md-6">
                                <label>Jam Buka</label>
                                <input type="time" class="form-control" name="jam_buka">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jam Tutup</label>
                                <input type="time" class="form-control" name="jam_libur">
                            </div>
                        </div>

                        <div class="form_group">
                            <label for="">Status Toko</label>
                            <select name="status_aktif" class="form-control" required>
                                <option value="0">Non-Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori_toko">
                                <option value="elektronik">elektronik</option>
                                <option value="otomotif">otomotif</option>
                                <option value="sembako">sembako</option>
                                <option value="fashion">fashion</option>
                                <option value="makanan">makanan</option>
                                <option value="obat">obat</option>
                                <option value="aksesoris">aksesoris</option>
                                <option value="perabotan">perabotan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Hari Buka : </label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="senin"
                                    value="senin">
                                <label for="senin" class="custom-control-label">Senin</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="selasa"
                                    value="selasa">
                                <label for="selasa" class="custom-control-label">Selasa</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="rabu"
                                    value="rabu">
                                <label for="rabu" class="custom-control-label">Rabu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="kamis"
                                    value="kamis">
                                <label for="kamis" class="custom-control-label">Kamis</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="jumat"
                                    value="jumat">
                                <label for="jumat" class="custom-control-label">Jumat</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="sabtu"
                                    value="sabtu">
                                <label for="sabtu" class="custom-control-label">Sabtu</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="hari_buka[]" id="minggu"
                                    value="minggu">
                                <label for="minggu" class="custom-control-label">Minggu</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Icon Toko</label>
                            <input type="file" name="icon_toko" class="form-control" enctype="multipart/form-data"
                                id="">
                        </div>


                        <form-group>
                            <label>Deskripsi Toko</label>
                            <textarea name="desc_toko" id="summernote">
                                </textarea>
                        </form-group>

                        <div class="modal-footer justify-content-between">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
