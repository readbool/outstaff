@include('components.head')
<section>
    <div class="container">
        <h1>
            BILLING MONTHLY LIST
        </h1>
    </div>
    <div class="container mt-5">
        <div class="form-floating">
            <select class="form-select" id="monthSelector"  aria-label="Select Month to show">
                @foreach($months as $month)
                <option value={{$month}}>{{$month}}</option>
                @endforeach
            </select>
            <label for="floatingSelect">Select Month to show listing</label>
        </div>
        <div id="listing">

        </div>
    </div>
</section>
@include('components.footer')
