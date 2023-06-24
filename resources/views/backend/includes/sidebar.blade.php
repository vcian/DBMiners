<div class="w-[250px] bg-light-black h-[calc(100vh-60px)] float-left" id="sidebar-menu">
    <ul class="py-3 border-solid border-black border-t-2">
        <li class="side-list px-[25px] py-[15px] relative">
            <a href="{{ route('dashboard') }}"
                class="flex items-center text-[15px] hover:text-white @if (Route::is(['dashboard'])) active @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <img src="{{ asset ('images/web/dashboard-white.svg') }}" alt="optimization"
                    class="me-3" width="20" />
                Dashboard
            </a>
        </li>
        <li class="side-list px-[25px] py-[15px] relative">
            <a href="{{ route('backend.db_connect.index') }}"
                class="flex items-center text-[15px] hover:text-white @if (Route::is(['backend.db_connect.*'])) active @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <img src="{{ asset ('images/web/optimization.svg') }}" alt="optimization"
                    class="me-3" width="20" />
                DB Connection
            </a>
        </li>
        <!-- <li class="side-list px-[25px] py-[15px] relative">
            <a href="{{ route('backend.standards.index') }}"
                class="flex items-center text-[15px] hover:text-white @if (Route::is(['backend.standards.*'])) active @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <img src="{{ asset ('images/web/logs.svg') }}" alt="optimization" class="me-3"
                    width="20" />
                Standards
            </a>
        </li> -->
        <li class="side-list px-[25px] py-[15px] relative">
            <a href="{{ route('backend.query_optimization.index') }}"
                class="flex items-center text-[15px] hover:text-white @if (Route::is(['backend.query_optimization.*'])) active @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <img src="{{ asset ('images/web/optimize.svg') }}" alt="optimization"
                    class="me-3" width="20" />
                Query Optimization
            </a>
        </li>
        <li class="side-list px-[25px] py-[15px] relative">
            <a href="{{ route('backend.schema_design.index') }}"
                class="flex items-center text-[15px] hover:text-white @if (Route::is(['backend.schema_design.*'])) active @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <img src="{{ asset ('images/web/query-logs.svg') }}" alt="optimization"
                    class="me-3" width="20" />
                Schema Design
            </a>
        </li>
        <!-- <li class="side-list px-[25px] py-[15px] relative">
            <a href="{{ route('backend.query_logs.index') }}"
                class="flex items-center text-[15px] hover:text-white @if (Route::is(['backend.query_logs.*'])) active @endif"
                aria-haspopup="true" data-menu-toggle="hover">
                <img src="{{ asset ('images/web/query-logs.svg') }}" alt="logs" class="me-3"
                    width="20" />
                Query Logs
            </a>
        </li> -->
        <!-- <li class="side-list px-[25px] py-[15px] relative">
            <a href="#" class="flex items-center text-[15px] hover:text-white">
                <img src="{{ asset ('images/web/commands.svg') }}" alt="commands" class="me-3"
                    width="20" />
                Commands
            </a>
        </li> -->
    </ul>
</div>