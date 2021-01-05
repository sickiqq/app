@can('administrador')
<ul class="nav nav-tabs mb-3">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-user"></i> Usuarios</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('companies.index') }}">
            <i class="far fa-building"></i> Empresas</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('branchoffices.index') }}">
            <i class="fas fa-archway"></i> Sucursales</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('tables.index') }}">
            <i class="fas fa-box"></i> Mesas</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-calendar-day"></i> Categorías</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('subcategories.index') }}">
            <i class="fas fa-calendar-minus"></i> Subcategorías</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fab fa-product-hunt"></i> Productos</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('promotions.index') }}">
            <i class="fas fa-hand-holding-usd"></i> Promociones</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('waiters.index') }}">
            <i class="fas fa-user-edit"></i> Meseros</a>
    </li>
</ul>
@endcan
