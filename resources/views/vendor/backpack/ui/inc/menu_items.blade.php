{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>

<x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')"/>
</x-backpack::menu-dropdown>

<x-backpack::menu-dropdown title="Notes" icon="bi bi-shop fs-1rem">
    <x-backpack::menu-item title="Notes" icon="bi bi-music-note-list fs-1rem" :link="backpack_url('notes')" />
</x-backpack::menu-dropdown>
