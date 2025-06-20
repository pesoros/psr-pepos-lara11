@php
    $checktableExist = Utility::checktableExist();
    if ($checktableExist) {
        $LangName = \App\Models\Languages::where('code', $currantLang)->value('fullName') ?? 'english';
    } else {
        $LangName = 'english';
    }
    $current_store = \Auth::user()->activeStore;
@endphp
<!-- [ Header ] start -->
@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <header class="dash-header transprent-bg">
@else
    <header class="dash-header">
@endif
<div class="header-wrapper">
    <div class="me-auto dash-mob-drp">
        {{-- <ul class="list-unstyled"> --}}
        <ul class="">
            <li class="dash-h-item mob-hamburger">
                <a href="#!" class="dash-head-link ms-0" id="mobile-collapse">
                    <div class="hamburger hamburger--arrowturn">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
            </li>
            <li class="dropdown dash-h-item drp-company">
                <a class="dash-head-link dropdown-toggle arrow-none m-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="theme-avtar">
                        <img class="border border-2 border-primary rounded theme-avtar" alt="#" style="width:30px;"
                            src="{{ !empty($users->avatar) ? $profile . '/' . $users->avatar : $profile . '/avatar.png' }}">
                    </span>
                    <span class="hide-mob">{{ 'Hi,' }}{{ Auth::user()->name }}!</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor hide-mob"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown">

                    <a href="{{ route('profile') }}" class="dropdown-item">
                        <i class="ti ti-user"></i>
                        <span>{{ __('My Profile') }}</span>
                    </a>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();document.getElementById('frm-logout').submit();">
                        <i class="ti ti-power"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <div class="ms-auto">
        <ul class="list-unstyled">
            @impersonating($guard = null)
                <li class="dropdown dash-h-item drp-company">
                    <a class="btn btn-danger btn-sm ms-2 me-2 exit-owner-btn"
                        href="{{ route('exit.owner') }}"><i class="ti ti-ban"></i>
                        {{ __('Exit Owner Login') }}
                    </a>
                </li>
            @endImpersonating
            @auth('web')
                @if (Auth::user()->type !== 'super admin')
                    @can('Create Store')
                        <li class="dropdown dash-h-item drp-language">
                            <a href="#!" class="dash-head-link dropdown-toggle arrow-none me-0 cust-btn" data-size="lg" data-url="{{ route('store-resource.create') }}"
                                data-ajax-popup="true" data-title="{{ __('Create New Store') }}">
                                <i class="ti ti-circle-plus"></i>
                                <span class="hide-mob">{{ __('Create New Store') }}</span>
                            </a>
                        </a>
                        </li>
                    @endcan
                @endif
            @endauth
            @if (Auth::user()->type !== 'super admin')
                <li class="dropdown dash-h-item drp-language">
                    <a class="dash-head-link dropdown-toggle arrow-none me-0 cust-btn"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false" data-bs-toggle="tooltip" data-bs-placement="bottom"   data-bs-original-title="Select your bussiness">
                        <i class="ti ti-building-store"></i>
                        <span class="hide-mob">{{__(ucfirst($current_store->name))}}</span>
                        <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                    </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @php
                        $user = \Auth::user()->currentuser();
                    @endphp
                    @foreach ($user->stores as $store)
                        @if ($store->is_store_enabled == 1)
                            <a href="@if (Auth::user()->current_store == $store->id) # @else {{ route('change_store', $store->id) }} @endif"
                                class="dropdown-item">
                                @if (Auth::user()->current_store == $store->id)
                                    <i class="ti ti-checks text-primary"></i>
                                @endif
                                <span>{{ $store->name }}</span>
                            </a>
                        @else
                            <a href="#!" class="dropdown-item">
                                <i class="ti ti-lock"></i>
                                <span>{{ $store->name }}</span>
                                @if (isset($store->pivot->permission))
                                    @if ($store->pivot->permission == 'Owner')
                                        <span class="badge bg-dark">{{ __($store->pivot->permission) }}</span>
                                    @else
                                        <span class="badge bg-dark">{{ __('Shared') }}</span>
                                    @endif
                                @endif
                            </a>
                        @endif
                    @endforeach
                    <div class="dropdown-divider m-0"></div>
                </div>
                </li>
            @endif
            <li class="dropdown dash-h-item drp-language">
                <a class="dash-head-link dropdown-toggle  language-dropdow-wrp arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ti ti-world "></i>
                    <span class="m-0">{{ ucFirst($LangName) }}</span>
                    <i class="ti ti-chevron-down drp-arrow nocolor"></i>
                </a>
                <div class="dropdown-menu dash-h-dropdown dropdown-menu-end">
                    @foreach ($languages as $code => $lang)
                        <a href="{{ route('change.language', $code) }}"
                            class="dropdown-item {{ $currantLang == $code ? 'text-primary' : '' }}">
                            <span>{{ucFirst($lang)}}</span>
                        </a>
                    @endforeach
                    @if (Auth::user()->type == 'super admin')
                        @can('Create Language')
                            <a href="#" data-url="{{ route('create.language') }}" data-size="md" data-ajax-popup="true" data-title="{{__('Create New Language')}}" class="dropdown-item border-top py-1 text-primary"
                            >{{ __('Create Language') }}</a>
                        @endcan
                        @can('Manage Language')
                            <a href="{{ route('manage.language', [$currantLang]) }}"
                                class="dropdown-item py-1 text-primary">{{ __('Manage Languages') }}
                            </a>
                        @endcan
                    @endif
                </div>
            </li>
        </ul>
    </div>
</div>
</header>
<!-- [ Header ] end -->
