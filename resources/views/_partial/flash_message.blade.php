@if(Session::has('flash_message'))
  <div class="alert alert-dismissible {{ Session::has('penting') ? 'alert-important alert-danger' : 'alert-success' }}">
    {{ Session::get('flash_message') }}
    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
  </div>
@endif
