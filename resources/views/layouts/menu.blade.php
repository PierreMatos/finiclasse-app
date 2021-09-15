@can('home')
    <li class="treeview">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
@endcan

@can('proposals.index')
    <li class="treeview">
        <a href="{{ route('proposals.index') }}" class="nav-link {{ Request::is('proposals*') ? 'active' : '' }}">
            <i class="fas fa-file-contract"></i>
            <p>Negócios</p>
        </a>
    </li>
@endcan

@can('financings.index')
    <li class="treeview">
        <a href="{{ route('financings.index') }}" class="nav-link {{ Request::is('financings*') ? 'active' : '' }}">
            <i class="fas fa-credit-card"></i>
            <p>Financiamentos</p>
        </a>
    </li>
@endcan

@can('cars.index')
    <li class="treeview">
        <a href="{{ route('cars.index') }}" class="nav-link {{ Request::is('cars*') ? 'active' : '' }}">
            <i class="fas fa-car"></i>
            <p>Viaturas</p>
        </a>
    </li>
@endcan

<!-- TODO criar role para ver clientes e vendedores -->
@can('users.index')
    <li class="treeview">
        <a href="{{ route('getClients') }}" class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <p>Clientes</p>
        </a>
    </li>
@endcan

@can('users.index')
    <li class="treeview">
        <a href="{{ route('getVendors') }}" class="nav-link {{ Request::is('vendors*') ? 'active' : '' }}">
            <i class="fas fa-user-tie"></i>
            <p>Vendedores</p>
        </a>
    </li>
@endcan

<li class="treeview nav-item">
    <a href="#" class="nav-link">
        <i class="fa fa-cog"></i>
        <p>
            Definições
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('stands.index')
            <li class="treeview">
                <a href="{{ route('stands.index') }}" class="nav-link {{ Request::is('stands*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Stands</p>
                </a>
            </li>
        @endcan

        @can('clientTypes.index')
            <li class="treeview">
                <a href="{{ route('clientTypes.index') }}"
                    class="nav-link {{ Request::is('clientTypes*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Clientes Tipos</p>
                </a>
            </li>
        @endcan

        @can('makes.index')
            <li class="treeview">
                <a href="{{ route('makes.index') }}" class="nav-link {{ Request::is('makes*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Marcas</p>
                </a>
            </li>
        @endcan

        @can('carModels.index')
            <li class="treeview">
                <a href="{{ route('carModels.index') }}"
                    class="nav-link {{ Request::is('carModels*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Modelos</p>
                </a>
            </li>
        @endcan

        @can('carCategories.index')
            <li class="treeview">
                <a href="{{ route('carCategories.index') }}"
                    class="nav-link {{ Request::is('carCategories*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Categorias</p>
                </a>
            </li>
        @endcan

        @can('carClasses.index')
            <li class="treeview">
                <a href="{{ route('carClasses.index') }}"
                    class="nav-link {{ Request::is('carClasses*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Classes</p>
                </a>
            </li>
        @endcan

        @can('carConditions.index')
            <li class="treeview">
                <a href="{{ route('carConditions.index') }}"
                    class="nav-link {{ Request::is('carConditions*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Condições</p>
                </a>
            </li>
        @endcan

        @can('carDrives.index')
            <li class="treeview">
                <a href="{{ route('carDrives.index') }}"
                    class="nav-link {{ Request::is('carDrives*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Trações</p>
                </a>
            </li>
        @endcan

        @can('carStates.index')
            <li class="treeview">
                <a href="{{ route('carStates.index') }}"
                    class="nav-link {{ Request::is('carStates*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Estados</p>
                </a>
            </li>
        @endcan

        @can('carTransmissions.index')
            <li class="treeview">
                <a href="{{ route('carTransmissions.index') }}"
                    class="nav-link {{ Request::is('carTransmissions*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Transmissões</p>
                </a>
            </li>
        @endcan

        @can('carFuels.index')
            <li class="treeview">
                <a href="{{ route('carFuels.index') }}"
                    class="nav-link {{ Request::is('carFuels*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Viaturas Combustíveis</p>
                </a>
            </li>
        @endcan

        @can('proposalStates.index')
            <li class="treeview">
                <a href="{{ route('proposalStates.index') }}"
                    class="nav-link {{ Request::is('proposalStates*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Negócios Estados</p>
                </a>
            </li>
        @endcan

        @can('financingProposals.index')
            <li class="treeview">
                <a href="{{ route('financingProposals.index') }}"
                    class="nav-link {{ Request::is('financingProposals*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Financiamento Negócios</p>
                </a>
            </li>
        @endcan

        @can('campaigns.index')
            <li class="treeview">
                <a href="{{ route('campaigns.index') }}"
                    class="nav-link {{ Request::is('campaigns*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Campanhas</p>
                </a>
            </li>
        @endcan

        @can('campaignsProposals.index')
            <li class="treeview">
                <a href="{{ route('campaignsProposals.index') }}"
                    class="nav-link {{ Request::is('campaignsProposals*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Campanhas Negócios</p>
                </a>
            </li>
        @endcan

        @can('benefits.index')
            <li class="treeview">
                <a href="{{ route('benefits.index') }}"
                    class="nav-link {{ Request::is('benefits*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Benefícios</p>
                </a>
            </li>
        @endcan

        @can('benefitsProposals.index')
            <li class="treeview">
                <a href="{{ route('benefitsProposals.index') }}"
                    class="nav-link {{ Request::is('benefitsProposals*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Benefícios Negócios</p>
                </a>
            </li>
        @endcan

        @can('benefitsBusinessStudies.index')
            <li class="treeview">
                <a href="{{ route('benefitsBusinessStudies.index') }}"
                    class="nav-link {{ Request::is('benefitsBusinessStudies*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Benefits Business Studies</p>
                </a>
            </li>
        @endcan

        @can('businenssStudyAuthorizations.index')
            <li class="treeview">
                <a href="{{ route('businenssStudyAuthorizations.index') }}"
                    class="nav-link {{ Request::is('businenssStudyAuthorizations*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Businenss Study Authorizations</p>
                </a>
            </li>
        @endcan

        @can('businessStudies.index')
            <li class="treeview">
                <a href="{{ route('businessStudies.index') }}"
                    class="nav-link {{ Request::is('businessStudies*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Business Studies</p>
                </a>
            </li>
        @endcan
    </ul>
</li>
