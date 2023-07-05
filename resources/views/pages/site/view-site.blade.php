@include('components.head')
<section>
    <div class="container">
        <h1>
            VIEW SITE
        </h1>
    </div>
    <div class="container mt-5">
        @if($error)
            <h4>{{$error}}</h4>
        @else
            <div class="row">
                <label>Site Name: </label><h5>{{$siteName}}</h5>
            </div>
            <div class="row">
                <label>Site Address: </label><h5>{{$siteAddress}}</h5>
            </div>
            <div class="row">
                <label>Total yearly average total amount: </label><h5>{{$totalAmount}}</h5>
            </div>
        @endif
    </div>
</section>
@include('components.footer')
