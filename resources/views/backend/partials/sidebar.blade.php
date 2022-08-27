<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="{{ route('admins.backend.index') }}" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{ asset('app/images/logo.png')  }}" srcset="{{ asset('app/images/logo.png') }} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{ asset('app/images/logo.png')  }}" srcset="{{ asset('app/images/logo.png') }} 2x" alt="logo-dark">
                <img class="logo-small logo-img logo-img-small" src="{{ asset('app/images/logo.png')  }}" srcset="{{ asset('app/images/logo.png') }} 2x" alt="logo-small">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div>
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    @include('backend.components._link', [
                        'route' => route('admins.backend.index'),
                        'name' => 'Dashboard',
                        'icon' => 'ni-grid-c'
                    ])

                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Administration</h6>
                    </li>

                    @include('backend.components._link', [
                       'route' => route('admins.categories.index'),
                       'name' => 'Categorie',
                       'icon' => 'ni-crop'
                   ])

                    @include('backend.components._link', [
                        'route' => route('admins.houses.index'),
                        'name' => 'Apartment',
                        'icon' => 'ni-building'

                    ])

                    @include('backend.components._link', [
                        'route' => route('admins.image.index'),
                        'name' => "Images",
                        'icon' => 'ni-img'
                    ])

                    @include('dealers.components._link', [
                       'route' => route('admins.slides.index'),
                       'name' => 'Slides',
                       'icon' => "ni-windows"
                   ])

                    @include('backend.components._link', [
                        'route' => route('admins.reservations.index'),
                        'name' => 'Reservation',
                        'icon' => 'ni-calendar-check'
                    ])

                    @include('backend.components._link', [
                        'route' => route('admins.transaction.index'),
                        'name' => 'Transaction',
                        'icon' => 'ni-money'
                    ])

                    @include('backend.components._link', [
                        'route' => route('admins.client.index'),
                        'name' => 'Clients',
                        'icon' => 'ni-user-list'
                    ])

                    @include('backend.components._link', [
                        'route' => route('admins.users.index'),
                        'name' => 'Commissionnaire',
                        'icon' => 'ni-user-alt'
                    ])

                    @include('backend.components._link', [
                        'route' => route('admins.notification.index'),
                        'name' => 'Notification',
                        'icon' => 'ni-bell'
                    ])
                </ul>
            </div>
        </div>
    </div>
</div>
