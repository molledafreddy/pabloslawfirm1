@extends('layouts.app')
@section('content')
    <app-content/>
@endsection
@section('scripts')
  <script>
  window.activar_video = function() {
      document.getElementById("video").play();
      $("#activador").hide()
  };


      if (screen.width<700) {
        $("#activador").show();

      }else{
        $("#activador").hide();
        activar_video()
      }




  $("#modal_video").modal("show");
  $("#video").on('ended', function(){
      $("#modal_video").modal("hide");
      });
  </script>
@endsection