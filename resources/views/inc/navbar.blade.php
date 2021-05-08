

  <nav class="navbar">
     <div class="site-title">
        <a href="{{ url('/') }}"><i class="fas fa-link"></i>
            DISSIDENT AI
        </a>
     </div>
     <a href="#" class="toggle">
         <span class="bar"></span>
         <span class="bar"></span>
         <span class="bar"></span>
     </a>
     <div class="navlinks">
    <ul>
        <li><a  href="/about">ABOUT</a></li>
        <li><a  href="/posts">STORIES</a></li>
        <li><a href="/posts/create">ADD UNIQUE STORY</a></li>
    </ul>
    </div>
<div class="">
    <div class="loglinks">
    <ul class="">
                <!-- Authentication Links -->
                        @guest
                        
                            @if (Route::has('login'))
                                <li class="">
                                    <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="">
                                    <a class="pink-btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
    </div>
                        @else
                        <li>
                        <a class="purple" href="/home">Dashboard: {{ Auth::user()->name }} </a>
                        </li>
                            <li class="">
                                    <a class="yellow" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __(' Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </li>
                        @endguest
                    </ul>
                </div>
      
        </nav>
        <nav class="navbar under">
    
            
            <div class="">
           <ul>
           <li class="resources"><a  href="/news"> Resources <i class="far fa-newspaper"></i></a>
           </li>
               <li class="under-menu-item"><a  href="/news">News</a></li>
               <li class="under-menu-item"><a  href="/blogs">Blogs</a></li>
               <li class="under-menu-item"><a href="/communities">Communities</a></li>
           </ul>
           </div>
        </nav>