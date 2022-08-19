@extends("admins.app")
@section('content')
<div class="form-group ">

    <div class="form-group">
        <div class="form-group">
            <input type="text" name="name" value="" class="form-control @error('name') is-invalid @enderror" id="" placeholder="nom de l'admin...">
            @error('name')
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" name="prenoms" value="" class="form-control @error('prenoms') is-invalid @enderror" id="" placeholder="Prenom de l'administrateur">
            @error('prenoms')
                <div class="invalid-feedback">
                    {{$errors->first('prenoms')}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <input type="email" name="email" value="" class="form-control @error('email') is-invalid @enderror" id="" placeholder="Email de l'administrateur">
            @error('email')
                <div class="invalid-feedback">
                    {{$errors->first('email')}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" value="" class="form-control @error('password') is-invalid @enderror" id="" placeholder="Ancien mot de pass de l'administrateur">
            @error('password')
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="new_password" value="" class="form-control @error('password') is-invalid @enderror" id="" placeholder="Nouveau mot de pass de l'administrateur">
            @error('password')
                <div class="invalid-feedback">
                    {{$errors->first('password')}}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <input type="text" name="fonction" value="@extends("admins.app")
            @section("content")
            <div class="my-3 p-6 bg-body rounded shadow-sm">
              <h3 class="border-bottom pb-2 mb-3">Edition d'un utilisateur</h3>
              <div class="mt-4">
                @if(session()->has("success"))
                  <div class="alert alert-success">
                    <h3>{{session()->get('success')}}</h3>
                  </div>
                  @endif
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                  @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                  @endforeach
                  </ul>
                </div>
                @endif
                <form style="width:65%;" method="post" action="{{route('utilisateurs.update',['utilisateur'=>$utilisateur->id])}}">
                  @csrf

                    <input type="hidden" name="_method" value="put">

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" required name="name" value="{{$utilisateur->name}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" required name="email" value="{{$utilisateur->email}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tel</label>
                <input type="number" class="form-control" required name="tel" value="{{$utilisateur->tel}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Adresse</label>
                <input type="text" class="form-control" required name="adresse" value="{{$utilisateur->adresse}}">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Sexe</label>
                <select class="form-control" required name="sexe">
                  <option value=""></option>
                  @if($utilisateur->sexe == "m")
                  <option value="m" selected>m</option>
                  <option value="f">f</option>
                  @else
                  <option value="m">m</option>
                  <option value="f" selected>f</option>
                  @endif
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Roles</label>
              </div>
              <div class="form-group ml-5">
                @foreach($roles as $role)
                                        <div class="form-group">
                                            <input
                                            type="checkbox"
                                            class="form-check-input"
                                            value="{{$role->id}}"
                                            name="roles[]"

                                            @foreach($utilisateur->roles as $userRole)
                                                @if($userRole->id === $role->id)
                                                    checked
                                                @endif
                                            @endforeach
                                            >
                                            <label for="" class="form-check-label">{{$role->name}}</label>

                                        </div>
                @endforeach
              </div>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
              <a href="{{route('admins.utilisateurs')}}" class="btn btn-danger">Annuler</a>
            </form>
              </div>
            </div>

            @endsection
            " class="form-control @error('fonction') is-invalid @enderror" id="" placeholder="Fonction de l'administrateur">
            @error('fonction')
                <div class="invalid-feedback">
                    {{$errors->first('fonction')}}
                </div>
            @enderror
        </div>
    </div>
</div>
@endsection
