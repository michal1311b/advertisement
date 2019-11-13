<div class="customer-logos">
    @if($companies->count())
        @foreach($companies as $company)
            <div class="slide">
                <img src="{{ $company->avatar }}" alt="{{ $company->profile->company_name ?? '' }}">
            </div>
        @endforeach
    @endif
</div>