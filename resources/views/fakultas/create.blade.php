@extends('main')

@section ('title','fakultas')
@section ('content')
    <div class = "row">
        <div class="col-12">
            <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">UMDP</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="{{ route('fakultas.store') }}" method="POST">
                    <!--begin::Body-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Fakultas</label>
                        <input type="text" class="form-control" nama="nama">
                        </div>
                      <div class="mb-3">
                        <label for="singkatan" class="form-label">Singkatan</label>
                        <input type="text" class="form-control" nama="singkatan">
                      </div>
                      <div class="mb-3">
                        <label for="nama_dekan" class="form-label">Nama Dekan</label>
                        <input type="text" class="form-control" nama="nama_dekan">
                        </div>
                      <div class="mb-3">
                        <label for="nama_wadek" class="form-label">Nama Wakil</label>
                        <input type="text" class="form-control" nama="nama_wadek">
                      </div>
                    </div>
                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>
                  <!--end::Form-->
                </div>
        </div>
    </div>

@endsection