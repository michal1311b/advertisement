@if(Session::has('message.success'))
    <div class="alert alert-success">
        {{ Session::get('message.success') }}
    </div>
@endif
@if(Session::has('message.error'))
    <div class="alert alert-danger">
        {{ Session::get('message.error') }}
    </div>
@endif
@if(Session::has('message.warning'))
    <div class="alert alert-warning">
        {{ Session::get('message.warning') }}
    </div>
@endif
@if(Session::has('message.info'))
    <div class="alert alert-info">
        {{ Session::get('message.info') }}
    </div>
@endif
