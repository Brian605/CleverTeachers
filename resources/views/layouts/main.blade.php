@php
    if (!auth()->user()->hasRole('Lecturer'))
        redirect('/login')->with(['type'=>'error','type'=>'error','message'=>'You are not authorized to access this site'])
     @endphp
<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

@include('partials.head')
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-theme="dark" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">
 {{--@include('partials.preloader')--}}
 @include('partials.sidebar')

 @include('partials.header')



  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">

     @yield('header')

        @yield('content')

    </div>
  </div>
  <!-- [ Main Content ] end -->
  <footer class="pc-footer">
    <div class="footer-wrapper container-fluid">
      <div class="row">
        <div class="col my-1">
          <p class="m-0"
            >Clevers Admin &#9829; crafted by
            <a href="https://tirotech.co.ke" target="_blank">TiroTech</a></p
          >
        </div>
        <div class="col-auto my-1">
          <ul class="list-inline footer-link mb-0">
            <li class="list-inline-item"><a href="/">Home</a></li>
           <li class="list-inline-item"><a href="https://tirotech.co.ke" target="_blank">Support</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer> <div class="pct-c-btn">
  <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
    <i class="ph-duotone ph-gear-six"></i>
  </a>
</div>
<div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Settings</h5>
    <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas" aria-label="Close"
      ><i class="ti ti-x"></i
    ></button>
  </div>
  <div class="pct-body" style="height: calc(100% - 85px)">
    <div class="offcanvas-body py-0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="pc-dark">
            <h6 class="mb-1">Theme Mode</h6>
            <p class="text-muted text-sm">Choose light or dark mode or Auto</p>
            <div class="row theme-color theme-layout">
              <div class="col-4">
                <div class="d-grid">
                  <button
                    class="preset-btn btn active"
                    data-value="true"
                    onclick="layout_change('light');"
                  >
                    <span class="btn-label">Light</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button
                    class="preset-btn btn"
                    data-value="false"
                    onclick="layout_change('dark');"
                  >
                    <span class="btn-label">Dark</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-4">
                <div class="d-grid">
                  <button
                    class="preset-btn btn"
                    data-value="default"
                    onclick="layout_change_default();"
                    data-bs-toggle="tooltip"
                    title="Automatically sets the theme based on user's operating system's color scheme."
                  >
                    <span class="btn-label">Default</span>
                    <span class="pc-lay-icon d-flex align-items-center justify-content-center">
                      <i class="ph-duotone ph-cpu"></i>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Header Theme</h6>
          <p class="text-muted text-sm">Choose Header Theme</p>
          <div class="row theme-color theme-header-color">
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn active"
                  data-value="true"
                  onclick="layout_header_change('dark');"
                >
                  <span class="btn-label">Dark</span>
                  <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn"
                  data-value="false"
                  onclick="layout_header_change('light');"
                >
                  <span class="btn-label">Light</span>
                  <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Accent color</h6>
          <p class="text-muted text-sm">Choose your primary theme color</p>
          <div class="theme-color preset-color">
            <a href="#!" class="active" data-value="preset-1"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-2"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-3"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-4"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-5"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-6"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-7"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-8"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-9"><i class="ti ti-check"></i></a>
            <a href="#!" data-value="preset-10"><i class="ti ti-check"></i></a>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Sidebar Theme</h6>
          <p class="text-muted text-sm">Choose Sidebar Theme</p>
          <div class="row theme-color theme-sidebar-color">
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn"
                  data-value="true"
                  onclick="layout_sidebar_change('dark');"
                >
                  <span class="btn-label">Dark</span>
                  <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn active"
                  data-value="false"
                  onclick="layout_sidebar_change('light');"
                >
                  <span class="btn-label">Light</span>
                  <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <h6 class="mb-1">Sidebar Caption</h6>
          <p class="text-muted text-sm">Sidebar Caption Hide/Show</p>
          <div class="row theme-color theme-nav-caption">
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn active"
                  data-value="true"
                  onclick="layout_caption_change('true');"
                >
                  <span class="btn-label">Caption Show</span>
                  <span class="pc-lay-icon"
                    ><span></span><span></span><span><span></span><span></span></span><span></span
                  ></span>
                </button>
              </div>
            </div>
            <div class="col-6">
              <div class="d-grid">
                <button
                  class="preset-btn btn"
                  data-value="false"
                  onclick="layout_caption_change('false');"
                >
                  <span class="btn-label">Caption Hide</span>
                  <span class="pc-lay-icon"
                    ><span></span><span></span><span><span></span><span></span></span><span></span
                  ></span>
                </button>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="pc-rtl">
            <h6 class="mb-1">Theme Layout</h6>
            <p class="text-muted text-sm">LTR/RTL</p>
            <div class="row theme-color theme-direction">
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn active"
                    data-value="false"
                    onclick="layout_rtl_change('false');"
                  >
                    <span class="btn-label">LTR</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn"
                    data-value="true"
                    onclick="layout_rtl_change('true');"
                  >
                    <span class="btn-label">RTL</span>
                    <span class="pc-lay-icon"><span></span><span></span><span></span><span></span></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="pc-container-width">
            <h6 class="mb-1">Layout Width</h6>
            <p class="text-muted text-sm">Choose Full or Container Layout</p>
            <div class="row theme-color theme-container">
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn active"
                    data-value="false"
                    onclick="change_box_container('false')"
                  >
                    <span class="btn-label">Full Width</span>
                    <span class="pc-lay-icon"
                      ><span></span><span></span><span></span><span><span></span></span
                    ></span>
                  </button>
                </div>
              </div>
              <div class="col-6">
                <div class="d-grid">
                  <button
                    class="preset-btn btn"
                    data-value="true"
                    onclick="change_box_container('true')"
                  >
                    <span class="btn-label">Fixed Width</span>
                    <span class="pc-lay-icon"
                      ><span></span><span></span><span></span><span><span></span></span
                    ></span>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="list-group-item">
          <div class="d-grid">
            <button class="btn btn-light-danger" id="layoutreset">Reset Layout</button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>

@include('partials.scripts')





  <script>layout_change('light');</script>



  <script>layout_sidebar_change('dark');</script>




  <script>layout_header_change('dark');</script>





  <script>change_box_container('false');</script>


  <script>layout_caption_change('true');</script>




  <script>layout_rtl_change('false');</script>


  <script>preset_change("preset-1");</script>
 @stack('extra')
@if(session()->exists('message'))
    <script>
        Swal.fire("{{session('title')}}","{{session('message')}}","{{session('type')}}")
    </script>
@endif
</body>
<!-- [Body] end -->

</html>
