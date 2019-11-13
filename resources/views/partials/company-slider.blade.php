<div class="customer-logos">
    @if($companies->count())
        @foreach($companies as $company)
            <div class="slide" tabindex="0" data-toggle="tooltip" title="{{ $company->profile->company_name ?? '' }}">
                <img class="slide-image" src="{{ $company->avatar }}" alt="{{ $company->profile->company_name ?? '' }}">
            </div>
        @endforeach
    @endif
</div>