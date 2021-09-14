



@can('home.index')
<li class="nav-item">
    <a href="{{ route('homr.index') }}"
       class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
        <p>Home</p>
    </a>
</li>
@endcan

@can('stands.index')
<li class="nav-item">
    <a href="{{ route('stands.index') }}"
       class="nav-link {{ Request::is('stands*') ? 'active' : '' }}">
        <p>Stands</p>
    </a>
</li>
@endcan


@can('makes.index')
<li class="nav-item">
    <a href="{{ route('makes.index') }}"
       class="nav-link {{ Request::is('makes*') ? 'active' : '' }}">
        <p>Makes</p>
    </a>
</li>
@endcan

@can('carCategories.index')
<li class="nav-item">
    <a href="{{ route('carCategories.index') }}"
       class="nav-link {{ Request::is('carCategories*') ? 'active' : '' }}">
        <p>Car Categories</p>
    </a>
</li>
@endcan

@can('carClasses.index')
<li class="nav-item">
    <a href="{{ route('carClasses.index') }}"
       class="nav-link {{ Request::is('carClasses*') ? 'active' : '' }}">
        <p>Car Classes</p>
    </a>
</li>
@endcan

@can('carConditions.index')
<li class="nav-item">
    <a href="{{ route('carConditions.index') }}"
       class="nav-link {{ Request::is('carConditions*') ? 'active' : '' }}">
        <p>Car Conditions</p>
    </a>
</li>
@endcan

@can('carDrives.index')
<li class="nav-item">
    <a href="{{ route('carDrives.index') }}"
       class="nav-link {{ Request::is('carDrives*') ? 'active' : '' }}">
        <p>Car Drives</p>
    </a>
</li>
@endcan

@can('carStates.index')
<li class="nav-item">
    <a href="{{ route('carStates.index') }}"
       class="nav-link {{ Request::is('carStates*') ? 'active' : '' }}">
        <p>Car States</p>
    </a>
</li>
@endcan

@can('carTransmissions.index')
<li class="nav-item">
    <a href="{{ route('carTransmissions.index') }}"
       class="nav-link {{ Request::is('carTransmissions*') ? 'active' : '' }}">
        <p>Car Transmissions</p>
    </a>
</li>
@endcan

@can('carModels.index')
<li class="nav-item">
    <a href="{{ route('carModels.index') }}"
       class="nav-link {{ Request::is('carModels*') ? 'active' : '' }}">
        <p>Car Models</p>
    </a>
</li>
@endcan

@can('proposalStates.index')
<li class="nav-item">
    <a href="{{ route('proposalStates.index') }}"
       class="nav-link {{ Request::is('proposalStates*') ? 'active' : '' }}">
        <p>Proposal States</p>
    </a>
</li>
@endcan

@can('benefits.index')
<li class="nav-item">
    <a href="{{ route('benefits.index') }}"
       class="nav-link {{ Request::is('benefits*') ? 'active' : '' }}">
        <p>Benefits</p>
    </a>
</li>
@endcan

@can('businenssStudyAuthorizations.index')
<li class="nav-item">
    <a href="{{ route('businenssStudyAuthorizations.index') }}"
       class="nav-link {{ Request::is('businenssStudyAuthorizations*') ? 'active' : '' }}">
        <p>Businenss Study Authorizations</p>
    </a>
</li>
@endcan

@can('businessStudies.index')
<li class="nav-item">
    <a href="{{ route('businessStudies.index') }}"
       class="nav-link {{ Request::is('businessStudies*') ? 'active' : '' }}">
        <p>Business Studies</p>
    </a>
</li>
@endcan


@can('benefitsBusinessStudies.index')
<li class="nav-item">
    <a href="{{ route('benefitsBusinessStudies.index') }}"
       class="nav-link {{ Request::is('benefitsBusinessStudies*') ? 'active' : '' }}">
        <p>Benefits Business Studies</p>
    </a>
</li>
@endcan


@can('proposals.index')
<li class="nav-item">
    <a href="{{ route('proposals.index') }}"
       class="nav-link {{ Request::is('proposals*') ? 'active' : '' }}">
        <p>Negócios</p>
    </a>
</li>
@endcan

@can('financings.index')
<li class="nav-item">
    <a href="{{ route('financings.index') }}"
       class="nav-link {{ Request::is('financings*') ? 'active' : '' }}">
        <p>Financiamentos</p>
    </a>
</li>
@endcan

@can('financingProposals.index')
<li class="nav-item">
    <a href="{{ route('financingProposals.index') }}"
       class="nav-link {{ Request::is('financingProposals*') ? 'active' : '' }}">
        <p>Financing Proposals</p>
    </a>
</li>
@endcan

@can('carFuels.index')
<li class="nav-item">
    <a href="{{ route('carFuels.index') }}"
       class="nav-link {{ Request::is('carFuels*') ? 'active' : '' }}">
        <p>Car Fuels</p>
    </a>
</li>
@endcan

@can('cars.index')
<li class="nav-item">
    <a href="{{ route('cars.index') }}"
       class="nav-link {{ Request::is('cars*') ? 'active' : '' }}">
        <p>Viaturas</p>
    </a>
</li>
@endcan

@can('users.index')
<li class="nav-item">
    <a href="{{ route('getClients') }}"
       class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
        <p>Clientes</p>
    </a>
</li>
@endcan

@can('campaigns.index')
<li class="nav-item">
    <a href="{{ route('campaigns.index') }}"
       class="nav-link {{ Request::is('campaigns*') ? 'active' : '' }}">
        <p>Campaigns</p>
    </a>
</li>
@endcan

@can('benefitsProposals.index')
<li class="nav-item">
    <a href="{{ route('benefitsProposals.index') }}"
       class="nav-link {{ Request::is('benefitsProposals*') ? 'active' : '' }}">
        <p>Benefits Proposals</p>
    </a>
</li>
@endcan


@can('campaignsProposals.index')
<li class="nav-item">
    <a href="{{ route('campaignsProposals.index') }}"
       class="nav-link {{ Request::is('campaignsProposals*') ? 'active' : '' }}">
        <p>Campaigns Proposals</p>
    </a>
</li>
@endcan

@can('clientTypes.index')
<li class="nav-item">
    <a href="{{ route('clientTypes.index') }}"
       class="nav-link {{ Request::is('clientTypes*') ? 'active' : '' }}">
        <p>Client Types</p>
    </a>
</li>
@endcan

@can('carClasses.index')
<li class="nav-item">
    <a href="{{ route('carClasses.index') }}"
       class="nav-link {{ Request::is('carClasses*') ? 'active' : '' }}">
        <p>Car Classes</p>
    </a>
</li>
@endcan
