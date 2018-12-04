            <h4>My Account</h4>
            <ul class="nav flex-md-column mb-md-0 mb-2">
              <li class="nav-item">
                <a class="nav-link {{ active_nav('account') }}" href="{{ route('account') }}">BOOKINGS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ active_nav('account.agenda') }}" href="{{ route('account.agenda') }}">AGENDA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ active_nav('account.settings') }}" href="{{ route('account.settings') }}">SETTINGS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    LOGOUT
                </a>
              </li>
            </ul>