<style>
    .custom-sidebar {
        width: 250px;
        height: 900px;
        position: fixed;
    }
</style>

<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark custom-sidebar">
    <a href="/" class="text-decoration-none custom-title mb-3">
        Dashboard
    </a>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin-dashboard/cars" class="nav-link text-white" aria-current="page">
                Cars
            </a>
        </li>
        <li>
            <a href="/admin-dashboard/users" class="nav-link text-white" aria-current="page">
                Users
            </a>
        </li>
    </ul>
</div>