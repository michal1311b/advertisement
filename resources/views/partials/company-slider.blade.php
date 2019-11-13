<div class="customer-logos">
    @if($companies->count())
        @foreach($companies as $company)
            <div class="slide">
                <img src="{{ $company->avatar }}" alt="">
            </div>
        @endforeach
    @endif
</div>