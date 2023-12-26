<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @foreach ($teamsWithNews as $teamWithNews)
            <li class="nav-item">
                <a href="/news/teams/{{ $teamWithNews->name }}" class="nav-link" aria-current="page">
                    {{ $teamWithNews->name }}
                </a>
            </li>
        @endforeach

    </ul>
    <hr>
</div>
