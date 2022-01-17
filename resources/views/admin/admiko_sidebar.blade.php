{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['processos_allow', 'processos_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "processos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.processos.index')}}"><i class="fas fa-file-signature fa-fw"></i>Processos</a></li>
@endIf
@if(Gate::any(['terceiros_allow', 'terceiros_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "terceiros" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.terceiros.index')}}"><i class="fas fa-user-friends fa-fw"></i>Terceiros</a></li>
@endIf
@if(Gate::any(['ativos_allow', 'ativos_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "ativos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.ativos.index')}}"><i class="fas fa-file-alt fa-fw"></i>Ativos</a></li>
@endIf
@if(Gate::any(['matriz_de_riscos_allow', 'matriz_de_riscos_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "matriz_de_riscos" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.matriz_de_riscos.index')}}"><i class="fas fa-exclamation-triangle fa-fw"></i>Matriz de Riscos</a></li>
@endIf
@if(Gate::any(['mapa_de_calor_allow', 'mapa_de_calor_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "mapa_de_calor" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.mapa_de_calor.index')}}"><i class="fas fa-map fa-fw"></i>Mapa de Calor</a></li>
@endIf
@if(Gate::any(['ripd_allow', 'ripd_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "ripd" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.ripd.index')}}"><i class="fas fa-file-alt fa-fw"></i>Relatório de Impacto</a></li>
@endIf
@if(Gate::any(['repositrio_allow', 'repositrio_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "repositrio" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.repositrio.index')}}"><i class="fas fa-box fa-fw"></i></i>Repositório de Politicas</a></li>
@endIf