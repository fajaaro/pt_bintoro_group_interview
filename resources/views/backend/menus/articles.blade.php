<li class="nav-item {{ request()->is('admin/articles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('backend.articles.index') }}">
        <i class="fas fa-newspaper"></i>
        <span>Articles</span>
    </a>
</li>