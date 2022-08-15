@extends("admins.app")
<style>
    h2 {
      padding: 16px;
      background-color: #00ff22;
    }
  </style>
@section('content')
<div class="my-3 p-6 bg-body rounded shadow-sm">
        <h3 class="border-bottom pb-2 mb-3">Resultat du Billetage de la Journée</h3>
        <div style="text-align:center"><h2>Billetage correct!</h2></div>
        <div style="text-align:center">
            <label for="size">Billet de 10 000 F: {{$billet_10000}}</label></br>
            <label for="size">Billet de 5000 F: {{$billet_5000}}</label></br>
            <label for="size">Billet de 2000F: {{$billet_2000}}</label></br>
            <label for="size">Billet de 1000F: {{$billet_1000}}</label></br>
            <label for="size">Billet de 500F: {{$billet_500}}</label></br>
            <label for="size">Pièce de 500F: {{$piece_500}}</label></br>
            <label for="size">Pièce de 250F: {{$piece_250}}</label></br>
            <label for="size">Pièce de 200F: {{$piece_200}}</label></br>
            <label for="size">Pièce de 100F: {{$piece_100}}</label></br>
            <label for="size">Pièce de 50F: {{$piece_50}}</label></br>
            <label for="size">Pièce de 25F: {{$piece_25}}</label></br>
            <label for="size">Pièce de 10F: {{$piece_10}}</label></br>
            <label for="size">Pièce de 5F: {{$piece_5}}</label></br>
            <a href="{{route('admins.welcome')}}" class="btn btn-danger">Retour</a>
        </div>
</div>
@endsection
