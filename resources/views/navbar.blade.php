<aside>
    <div class="top">
        <div class="logo">
            <h2>Quiz<span style="color:blue;">Grad</span></h2>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
        </div>
    </div>
    <div class="sidebar">
        <a href="/userdashboard" class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
            <span class="material-icons-sharp">grid_view</span>
            <h3>Dashboard</h3>
        </a>
        <a class="{{ Route::currentRouteName() == 'analytics' ? 'active' : '' }} "
            href="/analytics/{{ auth()->user()->Username }}">
            <span class="material-icons-sharp">insights</span>
            <h3>Analytics</h3>
        </a>
        <a href="" class="{{ Route::currentRouteName() == 'messages' ? 'active' : '' }}">
            <span class="material-icons-sharp">mail_outline</span>
            <h3>Messages</h3>
            <span class="message-count">20</span>
        </a>
        <a href="/profile/{{ auth()->user()->Username }}"
            class="{{ Route::currentRouteName() == 'profile' ? 'active' : '' }}">
            <span class="material-icons-sharp">person</span>
            <h3>Profile</h3>
        </a>
        <a href="">
            <span class="material-icons-sharp"
                class="{{ Route::currentRouteName() == '' ? 'active' : '' }}">person</span>
            <h3>Take test</h3>
        </a>
        <a href="/categories" class="{{ Route::currentRouteName() == 'categories' ? 'active' : '' }}">
            <span class="material-icons-sharp">edit_note</span>
            <h3>Create Quiz</h3>
        </a>
        <a href="">
            <span class="material-icons-sharp">settings</span>
            <h3>Settings</h3>
        </a>
        <a>
            <form action="/logout" method="post">
                @csrf
                <span class="material-icons-sharp">logout</span>
                <button>Log-out</button>
            </form>
        </a>
    </div>
</aside>