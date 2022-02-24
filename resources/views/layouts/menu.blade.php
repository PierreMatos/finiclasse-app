@can('home')
    <li class="treeview">
        <a href="{{ route('home') }}" class="nav-link {{ Request::is('/*') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>
@endcan

@can('proposals.index')
    <li class="treeview">
        <a href="{{ route('proposals.index') }}" class="nav-link {{ Request::is('proposals*') ? 'active' : '' }}">
            <i class="fas fa-file-contract"></i>
            <p>Propostas</p>
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

@can('campaigns.index')
    <li class="treeview">
        <a href="{{ route('campaigns.index') }}" class="nav-link {{ Request::is('campaigns*') ? 'active' : '' }}">
            <i class="fas fa-percent"></i>
            <p>Campanhas</p>
        </a>
    </li>
@endcan

@can('benefits.index')
    <li class="treeview">
        <a href="{{ route('benefits.index') }}" class="nav-link {{ Request::is('benefits*') ? 'active' : '' }}">
            <i class="fas fa-euro-sign"></i>
            <p>Benefícios</p>
        </a>
    </li>
@endcan

<li class="treeview nav-item {{ Request::is('cars*', 'new*') ? 'menu-open' : '' }} has-treeview">
    <a href="#" class="nav-link {{ Request::is('cars*', 'new*') ? 'menuDropActive' : '' }}" id="viaturas">
        <i class="fas fa-car"></i>
        <p>
            Viaturas
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @can('cars.index')
            <li class="treeview">
                <a href="{{ route('cars.index') }}" class="nav-link {{ Request::is('cars*') ? 'active' : '' }}">
                    <i class="fas fa-list-ul"></i>
                    <p>Todos</p>
                </a>
            </li>
        @endcan

        @can('cars.index')
            <li class="treeview">
                <a href="{{ route('new-car') }}" class="nav-link {{ Request::is('new*') ? 'active' : '' }}">
                    <i class="fas fa-plus-square"></i>
                    <p>Novos</p>
                </a>
            </li>
        @endcan
    </ul>
</li>

<!-- TODO criar role para ver clientes e vendedores -->
@can('users.index')
    <li class="treeview">
        <a href="{{ route('getClients') }}"
            class="nav-link {{ Request::is('clients-list*', 'users*') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
            <p>Clientes</p>
        </a>
    </li>
@endcan

@can('users.index')
    <li class="treeview">
        <a href="{{ route('getSellers') }}"
            class="nav-link {{ Request::is('sellers-list*', 'sellers*') ? 'active' : '' }}">
            <i class="fas fa-user-tie"></i>
            <p>Vendedores</p>
        </a>
    </li>
@endcan

@if (Auth::user()->hasRole(['admin', 'Administrador', 'Diretor comercial']))
    <li class="treeview">
        <a href="{{ route('push-notification') }}"
            class="nav-link {{ Request::is('push-notification*') ? 'active' : '' }}">
            <i class="fas fa-bell"></i>
            <p>Notificações</p>
        </a>
    </li>
@endif


<li class="treeview">
    <a href="https://www.myfiniclasse.pt/help-backoffice" target="_blank"
        class="nav-link {{ Request::is('help-backoffice*') ? 'active' : '' }}">
        <i class="fas fa-question-circle"></i>
        <p>Ajuda</p>
    </a>
</li>

@if (Auth::user()->hasRole(['admin']))
    <li
        class="treeview nav-item {{ !Request::is('/*','proposals*','financings*','campaigns*','benefits*','cars*','new*','clients-list*','sellers-list*','push-notification*','users*','sellers*')? 'menu-open': '' }} has-treeview">
        <a href="#"
            class="nav-link {{ !Request::is('/*','proposals*','financings*','campaigns*','benefits*','cars*','new*','clients-list*','sellers-list*','push-notification','users*','sellers*')? 'menuDropActive': '' }}"
            id="definicoes">
            <i class="fa fa-cog"></i>
            <p>
                Definições
                <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            @can('stands.index')
                <li class="treeview">
                    <a href="{{ route('stands.index') }}"
                        class="nav-link {{ Request::is('stands*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Stands</p>
                    </a>
                </li>
            @endcan

            @can('clientTypes.index')
                <li class="treeview">
                    <a href="{{ route('clientTypes.index') }}"
                        class="nav-link {{ Request::is('clientTypes*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Clientes Tipos</p>
                    </a>
                </li>
            @endcan

            @can('makes.index')
                <li class="treeview">
                    <a href="{{ route('makes.index') }}" class="nav-link {{ Request::is('makes*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Marcas</p>
                    </a>
                </li>
            @endcan

            @can('carModels.index')
                <li class="treeview">
                    <a href="{{ route('carModels.index') }}"
                        class="nav-link {{ Request::is('carModels*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Modelos</p>
                    </a>
                </li>
            @endcan

            @can('carCategories.index')
                <li class="treeview">
                    <a href="{{ route('carCategories.index') }}"
                        class="nav-link {{ Request::is('carCategories*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Categorias</p>
                    </a>
                </li>
            @endcan

            @can('carClasses.index')
                <li class="treeview">
                    <a href="{{ route('carClasses.index') }}"
                        class="nav-link {{ Request::is('carClasses*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Classes</p>
                    </a>
                </li>
            @endcan

            @can('carConditions.index')
                <li class="treeview">
                    <a href="{{ route('carConditions.index') }}"
                        class="nav-link {{ Request::is('carConditions*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Condições</p>
                    </a>
                </li>
            @endcan

            @can('carDrives.index')
                <li class="treeview">
                    <a href="{{ route('carDrives.index') }}"
                        class="nav-link {{ Request::is('carDrives*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Trações</p>
                    </a>
                </li>
            @endcan

            @can('carStates.index')
                <li class="treeview">
                    <a href="{{ route('carStates.index') }}"
                        class="nav-link {{ Request::is('carStates*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Estados</p>
                    </a>
                </li>
            @endcan

            @can('carTransmissions.index')
                <li class="treeview">
                    <a href="{{ route('carTransmissions.index') }}"
                        class="nav-link {{ Request::is('carTransmissions*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Transmissões</p>
                    </a>
                </li>
            @endcan

            @can('carFuels.index')
                <li class="treeview">
                    <a href="{{ route('carFuels.index') }}"
                        class="nav-link {{ Request::is('carFuels*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>V. Combustíveis</p>
                    </a>
                </li>
            @endcan

            @can('proposalStates.index')
                <li class="treeview">
                    <a href="{{ route('proposalStates.index') }}"
                        class="nav-link {{ Request::is('proposalStates*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Neg. Estados</p>
                    </a>
                </li>
            @endcan

            @can('financingProposals.index')
                <li class="treeview">
                    <a href="{{ route('financingProposals.index') }}"
                        class="nav-link {{ Request::is('financingProposals*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Fin. Negócios</p>
                    </a>
                </li>
            @endcan

            @can('campaignsProposals.index')
                <li class="treeview">
                    <a href="{{ route('campaignProposals.index') }}"
                        class="nav-link {{ Request::is('campaignProposals*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Campanhas Neg.</p>
                    </a>
                </li>
            @endcan

            @can('benefitsProposals.index')
                <li class="treeview">
                    <a href="{{ route('benefitProposals.index') }}"
                        class="nav-link {{ Request::is('benefitProposals*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Benefícios Neg.</p>
                    </a>
                </li>
            @endcan

            @can('benefitsBusinessStudies.index')
                <li class="treeview">
                    <a href="{{ route('benefitBusinessStudies.index') }}"
                        class="nav-link {{ Request::is('benefitBusinessStudies*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Benefícios Estudos</p>
                    </a>
                </li>
            @endcan

            @can('BusinessStudyAuthorizations.index')
                <li class="treeview">
                    <a href="{{ route('BusinessStudyAuthorizations.index') }}"
                        class="nav-link {{ Request::is('BusinessStudyAuthorizations*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Estudos Aut.</p>
                    </a>
                </li>
            @endcan

            @can('businessStudies.index')
                <li class="treeview">
                    <a href="{{ route('businessStudies.index') }}"
                        class="nav-link {{ Request::is('businessStudies*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Estudos Neg.</p>
                    </a>
                </li>
            @endcan

            @can('businessStudies.index')
                <li class="treeview">
                    <a href="{{ route('businessStudyStates.index') }}"
                        class="nav-link {{ Request::is('businessStudyStates*') ? 'active' : '' }}">
                        <i class="fas fa-eye"></i>
                        <p>Business Study States</p>
                    </a>
                </li>
            @endcan

        </ul>
    </li>
@endif

@push('page_scripts')
    <script>
        $(document).ready(function() {
            var url = window.location;
            const allLinks = document.querySelectorAll('.nav-item a');
            const currentLink = [...allLinks].filter(e => {
                return e.href == url;
            });

            //fix for "cannot read property 'style' of null" on windows.location urls not in the nav, indefined on edit/create pages with id number
            if (typeof currentLink[0] !== 'undefined') {
                if (currentLink[0].closest(".nav-treeview") !== null) {
                    currentLink[0].classList.add("active");
                    currentLink[0].closest(".nav-treeview").style.display = 'block';
                    currentLink[0].closest(".has-treeview").classList.add("active");
                    currentLink[0].closest(".has-treeview").classList.add("menu-open");
                }

                $('.menu-open #viaturas').addClass('menuDropActive');
                $('.menu-open #definicoes').addClass('menuDropActive');
            }
        });
    </script>
@endpush