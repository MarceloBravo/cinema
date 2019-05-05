@if(Session::has("message-ok"))
<div class="alert alert-success" role="alert">
  <strong>Echo!</strong> {{ Session::get("message-ok")}}
</div>
@endif
@if(Session::has("message-info"))
<div class="alert alert-info" role="alert">
  <strong>Atención!</strong> {{ Session::get("message-info") }}
</div>
@endif
@if(Session::has("message-warning"))
<div class="alert alert-warning" role="alert">
  <strong>Advertencia!</strong> {{ Session::get("message-warning") }}
</div>
@endif
@if(Session::has("message-error"))
<div class="alert alert-danger" role="alert">
  <strong>Error!</strong> {{ Session::get("message-error") }}
</div>
@endif