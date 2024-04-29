<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Velonic - Bootstrap 5 Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
        <meta content="Techzaa" name="author" />
        {{-- <link rel="stylesheet" href="//bootswatch.com/_vendor/bootstrap/dist/css/bootstrap.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">


        <!-- App favicon -->  
        <link rel="shortcut icon" href="{{asset('import/assets/images/favicon.ico')}}">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="{{asset('import/assets/vendor/daterangepicker/daterangepicker.css')}}">

        <!-- Vector Map css -->
        <link rel="stylesheet" href="{{asset('import/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}">

        <!-- Theme Config Js -->
        <script src="{{asset('import/assets/js/config.js')}}"></script>

        <!-- App css -->
        <link href="{{asset('import/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="{{asset('import/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css')}}" />
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            <div class="navbar-custom">
                <div class="topbar container-fluid">
                    <div class="d-flex align-items-center gap-1">

                        <!-- Topbar Brand Logo -->
                        <div class="logo-topbar">
                            <!-- Logo light -->
                            <a href="index.html" class="logo-light">
                                <span class="logo-lg">
                                    <img src="{{asset('import/assets/images/logo.png')}}" alt="logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="{{asset('import/assets/images/logo-sm.png')}}" alt="small logo">
                                </span>
                            </a>

                            <!-- Logo Dark -->
                            <a href="index.html" class="logo-dark">
                                <span class="logo-lg">
                                    <img src="{{asset('import/assets/images/logo-dark.png')}}" alt="dark logo">
                                </span>
                                <span class="logo-sm">
                                    <img src="{{asset('import/assets/images/logo-sm.png')}}" alt="small logo">
                                </span>
                            </a>
                        </div>

                        <!-- Sidebar Menu Toggle Button -->
                        <button class="button-toggle-menu">
                            <i class="ri-menu-line"></i>
                        </button>

                        <!-- Horizontal Menu Toggle Button -->
                        <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>

                        <!-- Topbar Search Form -->
                        <div class="app-search d-none d-lg-block">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search...">
                                    <span class="ri-search-line search-icon text-muted"></span>
                                </div>
                            </form>
                        </div>
                    </div>

                    <ul class="topbar-menu d-flex align-items-center gap-3">
                        <li class="dropdown d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i class="ri-search-line fs-22"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                <form class="p-3">
                                    <input type="search" class="form-control" placeholder="Search ..."
                                        aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        {{-- <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12">
                                

                                   
                                <!-- All-->
                                {{-- <a href="javascript:void(0);"
                                    class="dropdown-item text-center text-primary text-decoration-underline fw-bold notify-item border-top border-light py-2">
                                    View All
                                </a>

                            </div>
                        </li> --}}

                        {{-- <li class="d-none d-sm-inline-block">
                            <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                                <i class="ri-settings-3-line fs-22"></i>
                            </a>
                        </li>

                        <li class="d-none d-sm-inline-block">
                            <div class="nav-link" id="light-dark-mode">
                                <i class="ri-moon-line fs-22"></i>
                            </div>
                        </li> --}}


                        <span class="account-user-avatar">
                            <img src="{{asset('import/assets/images/LogoAFS-2.png')}}" alt="user-image" width="250">
                        </span>
                        

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle arrow-none nav-user" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="account-user-avatar">
                                    <img src="{{asset('import/assets/images/users/avatar-1.jpg')}}" alt="user-image" width="32" class="rounded-circle">
                                </span>
                                <span class="d-lg-block d-none">
                                    <h5 class="my-0 fw-normal">Admin<i
                                            class="ri-arrow-down-s-line d-none d-sm-inline-block align-middle"></i></h5>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                                <!-- item-->
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bienvenue Gestionnaire !</h6>
                                </div>

                                <!-- item-->
                                <a href="{{ route('formProduct')}}" class="dropdown-item">
                                    <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                                    <span>PRODUIT</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('formCustomer')}}" class="dropdown-item">
                                    <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                                    <span>CLIENT</span>
                                </a>

                                <!-- item-->
                                <a href="{{ route('formSupplier')}}" class="dropdown-item">
                                    <i class="ri-customer-service-2-line fs-18 align-middle me-1"></i>
                                    <span>FOURNISSEURS</span>
                                </a>

                                <!-- item-->
                                {{-- <a href="auth-lock-screen.html" class="dropdown-item">
                                    <i class="ri-lock-password-line fs-18 align-middle me-1"></i>
                                    <span>Lock Screen</span>
                                </a> --}}

                                <!-- item-->
                                <a href="{{ route('formConnect')}} class="dropdown-item">
                                    <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                                    <span>Deconnexion</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- ========== Topbar End ========== -->
            

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">

                <!-- Brand Logo Light -->      
                <a href="#" class="logo logo-light">
                    {{-- <span class="logo-lg">
                        <img src="{{asset('import/assets/images/logo.png')}}" alt="logo">
                    </span> --}}

                    <span class="account-user-avatar">
                        <img src="{{ asset('import/assets/images/LogoAFS-2.png') }}" alt="user-image" width="150">
                    </span>
                    
                    {{-- <span class="logo-sm">
                        <img src="{{asset('import/assets/images/logo-sm.png')}}" alt="small logo">
                    </span> --}}
                </a>

                <!-- Brand Logo Dark -->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('import/import/assets/images/logo-dark.png')}}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('import/assets/images/logo-sm.png')}}" alt="small logo">
                    </span>
                </a>

                <!-- Sidebar -left -->
                <div class="h-100" id="leftside-menu-container" data-simplebar>
                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        {{-- <li class="side-nav-title">Main</li> --}}

                        <li class="side-nav-item">
                            <a href="index.html" class="side-nav-link">
                                <i class="ri-dashboard-3-line"></i>
                                <span class="badge bg-success float-end"></span>
                                <span> Dashboard </span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                <i class="ri-pages-line"></i>
                                <span> PRODUIT </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPages">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route ('formProduct')}}">Ajouter Produit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route ('getListProduct')}}">Voir Liste Produit</a>
                                    </li>
                                   
                                   
                                </ul>
                            </div>
                        </li>

                        

                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" class="side-nav-link">
                                <i class="ri-layout-line"></i>
                                {{-- <span class="badge bg-warning float-end">New</span> --}}
                                <span>CLIENT</span>
                                
                            </a>
                            <div class="collapse" id="sidebarLayouts">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route ('formCustomer')}}" target="_blank">Ajouter Client</a>
                                    </li>
                                    <li>
                                        <a href="{{ route ('getListCustomer')}}" target="_blank">Liste Des Clients</a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </li>

                        
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBaseUI" aria-expanded="false" aria-controls="sidebarBaseUI" class="side-nav-link">
                                <i class="ri-briefcase-line"></i>
                                <span> FOURNISSEUR </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBaseUI">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{ route ('formSupplier')}}">Ajouter Fournisseurs</a>
                                    </li>
                                    <li>
                                        <a href="{{ route ('getListSupplier')}}">Liste Des Fournisseurs</a>
                                    </li>
                                    {{-- <li>
                                        <a href="ui-avatars.html">Avatars</a>
                                    </li> --}}
                                </ul>
                            </div>

                         <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth" class="side-nav-link">
                                <i class="ri-group-2-line"></i>
                                <span> DECONNEXION </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('formConnect')}}">Je me deconnecte</a>
                                    </li>
                                    {{-- <li>
                                        <a href="auth-register.html">Register</a>
                                    </li> --}}
                                    
                                </ul>
                            </div>
                        </li> 

                         

                         {{-- <li class="side-nav-title">Components</li> --}}

                      
                        {{-- </li>  --}}

                        {{-- <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarExtendedUI" aria-expanded="false" aria-controls="sidebarExtendedUI" class="side-nav-link">
                                <i class="ri-compasses-2-line"></i>
                                <span> Extended UI </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarExtendedUI">
                               
                            </div>
                        </li> --}}
                        {{-- <li 
                                        <a href="charts-chartjs.html">Chartjs</a>
                                    <
                                    <li>
                                        <a href="form-validation.html">Form Validation</a>
                                    </li>
                                    <li>
                                       
                                                            </li>
                                                        </ul>
                                                    </div> --}}
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>


                    </ul>
                    <!--- End Sidemenu -->

                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">APPLICATION DE GESTION DE STOCK</a></li>
                                            {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">TABLEAU DE BORD</a></li> --}}
                                            {{-- <li class="breadcrumb-item active">Bienvenue!</li> --}}
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Bienvenue!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                       <div class="row">
    <div class="col">
        <div class="card widget-flat text-bg-pink">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-eye-line widget-icon"></i>
                </div>
                <h2 class="text-uppercase mt-0" title="Customers">PRODUIT</h2>
                <h4 class="my-2"><p>Nombre de produits : {{ $nombreProduits }}</p>
                </h4>
                <p class="mb-0">
                    {{-- <span class="badge bg-white bg-opacity-10 me-1">2.97%</span> --}}
                    {{-- <span class="text-nowrap">Since last month</span> --}}
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col">
        <div class="card widget-flat text-bg-purple">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-wallet-2-line widget-icon"></i>
                </div>
                <h2 class="text-uppercase mt-0" title="Customers">FOURNISSEUR</h2>
                <h4 class="my-2"><p>Nombre de fournisseurs : {{ $nombreFournisseurs }}</p>
                </h4>
                <p class="mb-0">
                    {{-- <span class="badge bg-white bg-opacity-10 me-1">18.25%</span> --}}
                    {{-- <span class="text-nowrap">Since last month</span> --}}
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col">
        <div class="card widget-flat text-bg-info">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-shopping-basket-line widget-icon"></i>
                </div>
                <h2 class="text-uppercase mt-0" title="Customers">CLIENT</h2>
                <h4 class="my-2"><p>Nombre de Clients : {{ $nombreClients }}</p></h4>
                <p class="mb-0">
                    {{-- <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span> --}}
                    {{-- <span class="text-nowrap">Since last month</span> --}}
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    {{-- <div class="col">
        <div class="card widget-flat text-bg-primary">
            <div class="card-body">
                <div class="float-end">
                    <i class="ri-group-2-line widget-icon"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                <h2 class="my-2">63,154</h2>
                <p class="mb-0">
                    {{-- <span class="badge bg-white bg-opacity-10 me-1">8.21%</span> --}}
                    {{-- <span class="text-nowrap">Since last month</span> --}}
                {{-- </p>
            </div>
        </div>
    </div> <!-- end col-->
</div> --}} 

                        
                                        
                                    
                            </div> <!-- end col--> 

                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="javascript:;" data-bs-toggle="reload"><i class="ri-refresh-line"></i></a>
                                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                            </div>
                                            <h5 class="header-title mb-0">Liste Des Produits</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                             <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nom Produit</th>
                                                            <th>Description</th>
                                                            <th>Prix</th>
                                                            <th>Quantité en stock</th>
                                                            <th>Fournisseur</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach($produits as $produit)

                                                    <tbody>
                                                        
                                                        <tr>
                                                            <td>{{ $produit->id}}</td>
                                                            <td>{{ $produit->nom_produit}}</td>
                                                            <td>{{ $produit->description }}</td>
                                                            <td>{{ $produit->prix }}</td>
                                                            <td>{{ $produit->qte_en_stock }}</td>
                                                            <td>{{ $produit->fournisseur ? $produit->fournisseur->nom : 'Aucun fournisseur' }}</td>

                                                        </tr>
                                                    </tbody>
                                                    @endforeach

                                                </table> 

                                            </div>    
                                            {{-- <div>
                                                {{$produits->links()}}
    
                                            </div>    --}}

                                            {{-- <div class="row">
                                                @foreach($produits as $produit)
                                                <div class="col-md-2 mb-2">
                                                    <div class="card">
                                                       
                                                            <h5 class="card-title">{{ $produit->nom_produit }}</h5>
                                                            <!-- Prix du produit -->
                                                            <p class="card-text">Prix: {{ $produit->prix }} €</p>
                                                             <!-- Image du produit -->
                                                        <img src="{{ asset('images/' . $produit->image) }}" class="card-img-top" alt="{{ $produit->nom_produit }}">
                                                        <div class="card-body">
                                                            <!-- Titre du produit -->
                                                            <!-- Description du produit -->
                                                            <p class="card-text">{{ $produit->description }}</p>
                                                        </div>
                                                        <ul class="list-group list-group-flush">
                                                            <!-- Autres attributs du produit -->
                                                            <li class="list-group-item">Quantité en stock: {{ $produit->qte_en_stock }}</li>
                                                            <!-- Ajoutez d'autres attributs du produit ici si nécessaire -->
                                                        </ul>
                                                        <div class="card-body">
                                                            <!-- Liens supplémentaires si nécessaire -->
                                                            <a href="deleteProduct/{{ $produit->id }}" class="btn btn-danger">Supprimer</a>
                                                            <a href="updateProduct/{{ $produit->id }}" class="btn btn-info">MODIFIER</a>
                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            
                                            </div>
                                            {{$produits->links()}}

                                        </div> --}}
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            {{-- <div class="col-md-6">
                                <span class="account-user-avatar">
                                    <img src="{{asset('import/assets/images/LogoAFS-2.png')}}" alt="user-image" width="250">
                                </span>
                            </div> --}}
                            {{-- <div class="col-md-6 text-right">
                                <script>document.write(new Date().getFullYear())</script> Copyright© - Designed by <b>Cabinet Carrée</b>
                            </div> --}}
                            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                                American Food Store © 2024 Designed by Carree Marketing. Tous droits reservés
                                {{-- <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a> --}}
                                <span class="account-user-avatar">
                                  <img src="{{asset('import/assets/images/LogoAFS-2.png')}}" alt="user-image" width="250">
                              </span>
                              </div>
                        </div>
                    </div>
                </footer>
                
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                <h5 class="text-white m-0">Theme Settings</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-3">
                        <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">
                                        <img src="{{asset('import/assets/images/layouts/light.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme" id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">
                                        <img src="{{asset('import/assets/images/layouts/dark.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-fluid" value="fluid">
                                        <label class="form-check-label" for="layout-mode-fluid">
                                            <img src="{{asset('import/assets/images/layouts/light.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                                </div>

                                <div class="col-4">
                                    <div id="layout-boxed">
                                        <div class="form-check form-switch card-switch mb-1">
                                            <input class="form-check-input" type="checkbox" name="data-layout-mode" id="layout-mode-boxed" value="boxed">
                                            <label class="form-check-label" for="layout-mode-boxed">
                                                <img src="{{asset('import/assets/images/layouts/boxed.png')}}" alt="" class="img-fluid">
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">
                                        <img src="{{asset('import/assets/images/layouts/light.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-topbar-color" id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">
                                        <img src="{{asset('import/assets/images/layouts/topbar-dark.png')}}" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>

                        <div>
                            <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-light" value="light">
                                        <label class="form-check-label" for="leftbar-color-light">
                                            <img src="{{asset('import/assets/images/layouts/sidebar-light.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-menu-color" id="leftbar-color-dark" value="dark">
                                        <label class="form-check-label" for="leftbar-color-dark">
                                            <img src="{{asset('import/assets/images/layouts/light.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-default" value="default">
                                        <label class="form-check-label" for="leftbar-size-default">
                                            <img src="{{asset('import/assets/images/layouts/light.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-compact" value="compact">
                                        <label class="form-check-label" for="leftbar-size-compact">
                                            <img src="{{asset('import/assets/images/layouts/compact.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-small" value="condensed">
                                        <label class="form-check-label" for="leftbar-size-small">
                                            <img src="{{asset('import/assets/images/layouts/sm.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                                </div>


                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size" id="leftbar-size-full" value="full">
                                        <label class="form-check-label" for="leftbar-size-full">
                                            <img src="{{asset('import/assets/images/layouts/full.png')}}" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                            <div class="btn-group checkbox" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed" value="fixed">
                                <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-soft-primary w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="https://1.envato.market/velonic" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>        
        
        <!-- Vendor js -->
        <script src="{{asset('import/assets/js/vendor.min.js')}}"></script>

        <!-- Daterangepicker js -->
        <script src="{{asset('import/assets/vendor/daterangepicker/moment.min.js')}}"></script>
        <script src="{{asset('import/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        
        <!-- Apex Charts js -->
        <script src="{{asset('import/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

        <!-- Vector Map js -->
        <script src="{{asset('import/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('import/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

        <!-- Dashboard App js -->
        <script src="{{asset('import/assets/js/pages/dashboard.js')}}"></script>


        <!-- App js -->
        <script src="{{asset('import/assets/js/app.min.js')}}"></script>

    </body>
</html> 