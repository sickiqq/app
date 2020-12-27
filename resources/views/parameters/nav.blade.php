@can('administrador')
<ul class="nav nav-tabs mb-3">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-user"></i> Usuarios</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-user"></i> Categorías</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('subcategories.index') }}">
            <i class="fas fa-user"></i> Subcategorías</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-user"></i> Productos</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('promotions.index') }}">
            <i class="fas fa-user"></i> Promociones</a>
    </li>
</ul>
@endcan
