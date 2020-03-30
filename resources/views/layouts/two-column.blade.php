@include('layouts.header')
<div class="container">
    <div class="row">
        <div class="col-4">
            @section('sidebar')
                Menu
            @show
        </div>
        <div class="col-8">@yield('content')</div>
    </div>

</div>
@include('layouts.footer')


