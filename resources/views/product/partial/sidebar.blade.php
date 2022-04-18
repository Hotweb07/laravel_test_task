@php
    $price = config('custom.property.price');
    $bedrooms = config('custom.property.bedrooms');
    $bathrooms = config('custom.property.bathrooms');
    $garage = config('custom.property.garage');
    $land_size_min = config('custom.property.land_size_min');
    $land_size_max = config('custom.property.land_size_max');
@endphp
<!-- Sidebar-->
<div class="col-12 col-lg-3 px-0" id="sidebar-wrapper">
    <div class="close_sidbar d-block d-lg-none text-end">
        <button type="button" class="close-btn1" id="dismiss"><img src="{{ asset('front/images/close-button.png') }}" alt="close button"></button>
    </div>
    <div class="list-group list-group-flush">
        <form name="searchForm" id="searchForm" method="post" action="{{ route('search') }}">
            @csrf
            <ul class="list-unstyled list-inline">
                <li class="refine_search_title roboto_slab font22 rosegold left-border-bottom pb-3 mb-3 d-inline-block">Refine Your Search
                </li>
                <li class="mb-3 mt-3 search_icn">
                    <input type="text" name="address" id="address" class="search_address_bar roboto font15 fw-normal" placeholder="Search by Address" value="{{ old('address') }}">
                </li>
                <li class="mb-3">
                    <select name="property_type" id="property_type" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Property Type</option>
                        @foreach($propertyType as $k=>$v)
                            <option {{ (old("property_type") == $v['id'] ? "selected":"") }} value="{{ $v['id'] }}" class="roboto font15 fw-normal colorccc">{{ $v['name'] }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="price_min" id="price_min" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Price Min</option>
                        @foreach($price as $k=>$v)
                            <option {{ (old("price_min") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $v }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="price_max" id="price_max" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Price Max</option>
                        @foreach($price as $k=>$v)
                            <option {{ (old("price_max") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $v }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="bedrooms" id="bedrooms" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Bedrooms</option>
                        @foreach($bedrooms as $k)
                            <option {{ (old("bedrooms") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $k }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="bathrooms" id="bathrooms" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Bathrooms</option>
                        @foreach($bathrooms as $k)
                            <option {{ (old("bathrooms") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $k }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="garage" id="garage" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Garage</option>
                        @foreach($garage as $k)
                            <option {{ (old("garage") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $k }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="land_size_min" id="land_size_min" id="bedrooms" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Land Size Min</option>
                        @foreach($land_size_min as $k)
                            <option {{ (old("land_size_min") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $k }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="mb-3">
                    <select name="land_size_max" id="land_size_max" id="bedrooms" class="form-select selectbox_for_search roboto font15 fw-normal colorccc">
                        <option value="" class="roboto font15 fw-normal colorccc">Land Size Max</option>
                        @foreach($land_size_max as $k)
                            <option {{ (old("land_size_max") == $k ? "selected":"") }} value="{{ $k }}" class="roboto font15 fw-normal colorccc">{{ $k }}</option>
                        @endforeach
                    </select>
                </li>
                <li class="list-group-item-action mb-3">
                    <button type="submit" class="search_btn roboto_slab font18 medium grey_color d-inline-block text-center">Search</button>
                </li>
                <li class="list-group-item-action">
                    <button type="button" id="resetbtn" class="search_btn roboto_slab font18 medium grey_color d-inline-block text-center">Reset</button>
                </li>
            </ul>
        </form>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', event => {
            // Toggle the side navigation
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }
        });
        window.addEventListener('DOMContentLoaded', event => {
            // Toggle the side navigation
            const dismiss = document.body.querySelector('#dismiss');
            if (dismiss) {
                dismiss.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }
        });
        $(function () {
            $('#resetbtn').click(function () {
                $('#searchForm')[0].reset();
                $('#topForm')[0].reset();
                setTimeout(function () {
                    window.location = '{{ route('search') }}';
                },100)
            });
        });
    </script>
@endpush
