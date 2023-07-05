@include('components.head')
<section>
    <div class="container">
        <h1>
            BILLING MONTHLY LIST
        </h1>
    </div>
    <div class="container mt-5">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                SELECT MONTH
            </button>
            <ul class="dropdown-menu">
                @foreach($months as $month)
                    <li id="monthSelector" class="dropdown-item">
                        {{$month}}
                    </li>
                @endforeach
            </ul>
        </div>
        <div>

        </div>
    </div>
</section>
@include('components.footer')
