@if(Session::has('error'))
<div class="alert alert-danger alert-dismissible">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4 translate="yes"><i class="icon fa fa-ban"></i> {{__('An error has occurred')}}</h4>  {{ Session::get('error') }}
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h4><i class="icon fa fa-check"></i> {{__('Your Action was Successful')}}</h4> {{ Session::get('success') }}
    
</div>
@endif
