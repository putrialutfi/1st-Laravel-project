@extends('admins.template')

@section('main')
  <div id="akun">
    <h2>Akun Admin</h2>

    @include('_partial.flash_message')

  @if(count($akun_list) > 0)
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <h4 class="card-title">Akun Admin</h4>
              <div style="float:right;">
                <a href="akun/create" class="btn btn-primary">Tambah Akun</a>
              </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($akun_list as $akun)
                    <tr>
                      <td>{{ $akun->name }}</td>
                      <td>{{ $akun->username }}</td>
                      <td>{{ $akun->email }}</td>
                      <td>
                        <div class="form-inline">
                          <div class="box-button">{{ link_to('admins/akun/' . $akun->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}</div>
                          <div class="box-button">
                            {!! Form::open(['method' => 'DELETE', 'action' => ['AkunController@destroy', $akun->id]]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                          </div>
                        </div>
                      </td>
                    </tr>
          					@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  @else
    <p> Tidak Ada Akun Admin</p>
  @endif

  </div>
@stop
