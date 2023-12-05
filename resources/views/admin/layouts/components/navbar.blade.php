<header class="pc-header">
  <div class="header-wrapper">
      <!-- [Mobile Media Block] start -->
      <div class="me-auto pc-mob-drp">
          <ul class="list-unstyled">
              <!-- ======= Menu collapse Icon ===== -->
              <li class="pc-h-item pc-sidebar-collapse">
                  <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                      <i class="ti ti-menu-2"></i>
                  </a>
              </li>
              <li class="pc-h-item pc-sidebar-popup">
                  <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                      <i class="ti ti-menu-2"></i>
                  </a>
              </li>
             
          </ul>
      </div>
      <!-- [Mobile Media Block end] -->
      <div class="ms-auto">
          <ul class="list-unstyled">
              <li class="dropdown pc-h-item">
                  <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                      role="button" aria-haspopup="false" aria-expanded="false">
                      <svg class="pc-icon">
                          <use xlink:href="#custom-sun-1"></use>
                      </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                      <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                          <svg class="pc-icon">
                              <use xlink:href="#custom-moon"></use>
                          </svg>
                          <span>Dark</span>
                      </a>
                      <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                          <svg class="pc-icon">
                              <use xlink:href="#custom-sun-1"></use>
                          </svg>
                          <span>Light</span>
                      </a>
                      <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                          <svg class="pc-icon">
                              <use xlink:href="#custom-setting-2"></use>
                          </svg>
                          <span>Default</span>
                      </a>
                  </div>
              </li>
              <li class="dropdown pc-h-item">
                  <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#"
                      role="button" aria-haspopup="false" aria-expanded="false">
                      <svg class="pc-icon">
                          <use xlink:href="#custom-setting-2"></use>
                      </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                      <a href="#!" class="dropdown-item">
                          <i class="ti ti-user"></i>
                          <span>My Account</span>
                      </a>
                      <a href="#!" class="dropdown-item">
                          <i class="ti ti-settings"></i>
                          <span>Settings</span>
                      </a>
                      <a href="#!" class="dropdown-item">
                          <i class="ti ti-headset"></i>
                          <span>Support</span>
                      </a>
                      <a href="#!" class="dropdown-item">
                          <i class="ti ti-lock"></i>
                          <span>Lock Screen</span>
                      </a>
                      <a href="#!" class="dropdown-item">
                          <i class="ti ti-power"></i>
                          <span>Logout</span>
                      </a>
                  </div>
              </li>

              <li class="dropdown pc-h-item header-user-profile">
                  <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                      href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                      aria-expanded="false">
                      <img src="/admin/images/user/avatar-2.jpg" alt="user-image" class="user-avtar" />
                  </a>
                  <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                      <div class="dropdown-header d-flex align-items-center justify-content-between">
                          <h5 class="m-0">Profile</h5>
                      </div>
                      <div class="dropdown-body">
                          <div class="profile-notification-scroll position-relative"
                              style="max-height: calc(100vh - 225px)">
                              <div class="d-flex mb-1">
                                  <div class="flex-shrink-0">
                                      <img src="/admin/images/user/avatar-2.jpg" alt="user-image"
                                          class="user-avtar wid-35" />
                                  </div>
                                  <div class="flex-grow-1 ms-3">
                                      <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                                      <span>{{ Auth::user()->email }}</span>
                                  </div>
                              </div>
                              <hr class="border-secondary border-opacity-50" />
                             
                            
                              <a href="/panel/admin" class="dropdown-item">
                                  <span>
                                      <svg class="pc-icon text-muted me-2">
                                          <use xlink:href="#custom-lock-outline"></use>
                                      </svg>
                                      <span>Change Password</span>
                                  </span>
                              </a>
                             
                              <hr class="border-secondary border-opacity-50" />
                              <div class="d-grid mb-3">
                                  <a class="btn btn-primary" href="{{ route('admin.logout') }}"
                                  onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                      <svg class="pc-icon me-2">
                                          <use xlink:href="#custom-logout-1-outline"></use>
                                      </svg>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                              </div>

                              
                            
                           
                          </div>
                      </div>
                  </div>
              </li>
          </ul>
      </div>
  </div>
</header>
<div class="offcanvas pc-announcement-offcanvas offcanvas-end" tabindex="-1" id="announcement"
  aria-labelledby="announcementLabel">
  <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="announcementLabel">What’s new announcement?</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
      <p class="text-span">Today</p>
      <div class="card mb-3">
          <div class="card-body">
              <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
                  <div class="badge bg-light-success f-12">Big News</div>
                  <p class="mb-0 text-muted">2 min ago</p>
                  <span class="badge dot bg-warning"></span>
              </div>
              <h5 class="mb-3">Able Pro is Redesigned</h5>
              <p class="text-muted">Able Pro is completely renowed with high aesthetics User Interface.</p>
              <img src="/admin/images/layout/img-announcement-1.png" alt="img" class="img-fluid mb-3" />
              <div class="row">
                  <div class="col-12">
                      <div class="d-grid"><a class="btn btn-outline-secondary"
                              href="https://1.envato.market/c/1289604/275988/4415?subId1=phoenixcoded&u=https%3A%2F%2Fthemeforest.net%2Fitem%2Fable-pro-responsive-bootstrap-4-admin-template%2F19300403"
                              target="_blank">Check Now</a></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="card mb-3">
          <div class="card-body">
              <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
                  <div class="badge bg-light-warning f-12">Offer</div>
                  <p class="mb-0 text-muted">2 hour ago</p>
                  <span class="badge dot bg-warning"></span>
              </div>
              <h5 class="mb-3">Able Pro is in best offer price</h5>
              <p class="text-muted">Download Able Pro exclusive on themeforest with best price. </p>
              <a href="https://1.envato.market/c/1289604/275988/4415?subId1=phoenixcoded&u=https%3A%2F%2Fthemeforest.net%2Fitem%2Fable-pro-responsive-bootstrap-4-admin-template%2F19300403"
                  target="_blank"><img src="/admin/images/layout/img-announcement-2.png" alt="img"
                      class="img-fluid" /></a>
          </div>
      </div>

      <p class="text-span mt-4">Yesterday</p>
      <div class="card mb-3">
          <div class="card-body">
              <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
                  <div class="badge bg-light-primary f-12">Blog</div>
                  <p class="mb-0 text-muted">12 hour ago</p>
                  <span class="badge dot bg-warning"></span>
              </div>
              <h5 class="mb-3">Featured Dashboard Template</h5>
              <p class="text-muted">Do you know Able Pro is one of the featured dashboard template selected by
                  Themeforest team.?</p>
              <img src="/admin/images/layout/img-announcement-3.png" alt="img" class="img-fluid" />
          </div>
      </div>
      <div class="card mb-3">
          <div class="card-body">
              <div class="align-items-center d-flex flex-wrap gap-2 mb-3">
                  <div class="badge bg-light-primary f-12">Announcement</div>
                  <p class="mb-0 text-muted">12 hour ago</p>
                  <span class="badge dot bg-warning"></span>
              </div>
              <h5 class="mb-3">Buy Once - Get Free Updated lifetime</h5>
              <p class="text-muted">Get the lifetime free updates once you purchase the Able Pro.</p>
              <img src="/admin/images/layout/img-announcement-4.png" alt="img" class="img-fluid" />
          </div>
      </div>
  </div>
</div>