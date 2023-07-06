@include('components.head')
<section>
    <div class="container">
        <h1>
            User site list
        </h1>
    </div>
    <div class="container mt-5">
        @if($error)
            <h4>{{$error}}</h4>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total Amount ($)</th>
                    <th scope="col">Electric Usage (kwH)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $siteData)
                    <tr>
                        <th scope="row">{{$siteData->name}}</th>
                        <td>{{$siteData->address}}</td>
                        <td>{{$siteData->total_amount}}</td>
                        <td>{{$siteData->electricity_usage}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
    </div>
</section>
@include('components.footer')
