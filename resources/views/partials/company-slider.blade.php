<div class="customer-logos">
    @if($companies->count())
        @foreach($companies as $company)
            <a href="{{ route('company-show', $company) }}" title="{{ $company->profile->company_name ?? '' }}">
                <div class="slide" tabindex="0" data-toggle="tooltip">
                    <img class="slide-image" src="{{ $company->avatar }}" alt="{{ $company->profile->company_name ?? '' }}">
                </div>
            </a>
        @endforeach
    @endif
</div>