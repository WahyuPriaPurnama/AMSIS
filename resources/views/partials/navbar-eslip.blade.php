{{-- resources/views/partials/navbar-eslip.blade.php --}}
<ul class="dropdown-menu">
    <li><a class="dropdown-item @yield('menuAMS')" href="/ams-malang" wire:navigate>AMS Holding</a></li>
    <li><a class="dropdown-item @yield('menuRMM')" href="/rmm-malang" wire:navigate>RMM</a></li>
    <li><a class="dropdown-item @yield('menuELN')" href="/eln-malang" wire:navigate>ELN Malang</a></li>
    <li><a class="dropdown-item @yield('menuELN2')" href="/eln-bwi" wire:navigate>ELN Banyuwangi</a></li>
    <li><a class="dropdown-item @yield('menuHAKA')" href="/haka-bwi" wire:navigate>HAKA</a></li>
    <li><a class="dropdown-item @yield('menuBOFI')" href="/bofi-bwi" wire:navigate>BOFI</a></li>
</ul>
