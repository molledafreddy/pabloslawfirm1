<div class="modal" tabindex="-1" role="dialog" id="modal_video" >
      <div class="" role="document">
        <div class="modal-content">
              <div  id="activador"  class="video-android text-center" onclick="activar_video()"><div class="boton-play"><i class="far fa-play-circle margen-boton "></i></div></div>
              <video id="video"  poster="img/poster.png" class="d-block w-100"  >
                <source src="img/video.mp4" type="video/mp4">
                </video>
          </div>
        </div>
  </div>

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