<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Add Player - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="/admin/home">Admin Home</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('admin.logout') }}" method="POST" id="logout-form" class="d-none"> @csrf
                        </form>
                      </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="/admin/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Add Teams
                                        <div class="sb-sidenav"></div>
                                    </a>
                                    <a class="nav-link collapsed" href="/admin/add-player" >
                                        Add Players
                                        <div class="sb-sidenav"></div>
                                    </a>

                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::guard('admin')->user()->username }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Player</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <form action="{{ route('admin.add-player') }}" method="post" id="add-player-form">
                                @csrf
                            <div class="col-md-6">
                              <div class="row mb-3">
                                <div class="col-md-3">
                                    <span class="input-group-text" id="basic-addon1">First Name</span>
                                  <input type="text" class="form-control" placeholder="Player's First name">
                                </div>
                                <div class="col-md-3">
                                    <span class="input-group-text" id="basic-addon1">Last Name</span>
                                  <input type="text" class="form-control" placeholder="Player's Last name">
                                </div>
                              </div>

                              <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Age</span>
                                <input
                                  type="number"
                                  class="form-control"
                                  id="basic-url1"
                                  placeholder="Player's Age";
                                  aria-describedby="basic-addon3"
                                />
                              </div>

                              <div class="input-group mb-3">
                                <span class="input-group-text">Market Value</span>
                                <input
                                  type="number"
                                  placeholder="Player's Market Value"
                                  class="form-control"

                                />
                                </div>

                              <div class="input-group mb-3">
                                <span class="input-group-text">Post</span>
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="Player's Post"
                                  aria-label="Username"
                                />
                            </div>
                            <button type="submit" class="card bg-primary text-white mb-2">
                                <div class="card-body">Add</div>
                            </button>
                            </div>
                    </form>
                </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; TeamsMNGM</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

        <script>
            toastr.options.peventDuplicates = true;

            $.ajaxSetup({
                headers:
                {'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }

            $(function){

                $('#add-player-form').on('submit',function(e){
                    e.preventDefault();
                    alert('hello form');
                }
            }
            });
    </body>
</html>
