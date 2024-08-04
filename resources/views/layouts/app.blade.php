
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Authentication - Website Portal Desa Kragilan</title>
  <link rel="shortcut icon" type="image/png" href="admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="admin/assets/css/styles.min.css" />
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">

              @yield('auth')
    
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>