@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Нэр</th>
                              <th scope="col">Имэйл</th>
                              <th scope="col">Төлөв</th>
                              <th scope="col">Идэвхижүүлсэн огноо</th>
                              <th scope="col">&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($users as $user)
                                <tr>
                                  <th scope="row">1</th>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->name }}</td>
                                  @if($user->active === 1)
                                        <td>Идэвхитэй</td>
                                  @else
                                       <td>Идэвхигүй</td>
                                  @endif
                                  <td>{{ $user->email_verified_at }}</td>
                                  <td>                                   
                                    <a class="btn btn-outline-info" href="{{ route('users.active', $user->id)}}" role="button" onclick="return confirm('Хэрэглэгчийн төлөвийг өөрчлөх үү?')">Идэвхижүүлэх</a>                                   
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
@endsection
