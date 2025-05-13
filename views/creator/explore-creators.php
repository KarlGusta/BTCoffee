<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database, creator class, and paths configuration
include_once '../../config/paths.php';

// Only include header files after all potential redirects
include '../../includes/admin/admin_header.php';
?>
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-10 mx-auto">
                <div class="card grey-background" style="border: none; box-shadow: none; padding: 16px;">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-home-7" class="nav-link active" data-bs-toggle="tab">Explore creators</a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-profile-7" class="nav-link" data-bs-toggle="tab">Following</a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-home-7">
                                <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                                    <form action="." method="get">
                                        <div class="input-icon">
                                            <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <circle cx="10" cy="10" r="7" />
                                                    <line x1="21" y1="21" x2="15" y2="15" />
                                                </svg>
                                            </span>
                                            <input type="text" value="" class="form-control card-custom" placeholder="Search 1,000,000+ creators" aria-label="Search in website">
                                        </div>
                                    </form>
                                </div>

                                <!-- Page title -->
                                <div class="page-header d-print-none">
                                    <div class="row g-2 align-items-center">
                                        <div class="col">
                                            <h2 class="page-title">
                                                Trending creators this week
                                            </h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card card-custom">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#1</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Simple Politics</a>
                                                            <div class="text-muted text-truncate mt-n1">Helping people have better conversations about politics</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#2</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#3</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#4</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#5</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#6</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#7</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#8</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#9</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-auto">#10</div>
                                                        <a href="#" class="col-auto">
                                                            <span class="avatar avatar-rounded avatar-md" style="background-image: url(../../assets/img/karl_image.png)"></span>
                                                        </a>
                                                        <div class="col text-truncate">
                                                            <a href="#" class="text-reset d-block text-truncate">Cara</a>
                                                            <div class="text-muted text-truncate mt-n1">building a new platform for artists</div>
                                                            <div class="text-muted text-truncate mt-n1">
                                                                <!-- Heart/Supporters icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                                                </svg>
                                                                6182 Supporters
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page title -->
                                <div class="page-header d-print-none">
                                    <div class="row g-2 align-items-center">
                                        <div class="col">
                                            <h2 class="page-title">
                                                Published now <div class="col-auto">
                                                    <span class="status-indicator status-orange status-indicator-animated">
                                                        <span class="status-indicator-circle"></span>
                                                        <span class="status-indicator-circle"></span>
                                                        <span class="status-indicator-circle"></span>
                                                    </span>
                                                </div>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-profile-7">
                                <div>Fringilla egestas nunc quis tellus diam rhoncus ultricies tristique enim at diam, sem nunc amet, pellentesque id egestas velit sed</div>
                            </div>
                            <div class="tab-pane" id="tabs-settings-7">
                                <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/admin/admin_footer.php'; ?>