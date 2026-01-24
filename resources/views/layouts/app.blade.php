<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dash/assets/imgs/theme/favicon.svg') }}">
    <link href="{{ asset('dash/assets/css/style.css?v=1.0.0') }}" rel="stylesheet">
    <link href="{{ asset('vendor/livewire/livewire.css') }}" rel="stylesheet">
    @livewireStyles
    <title>Ecom - Marketplace Dashboard Template</title>
  </head>
  <body>
    <div class="screen-overlay"></div>

    @include('layouts.sidebar')

    <main class="main-wrap">

      @include('layouts.navbar')

      @yield('content')

      <footer class="main-footer font-xs">
        <div class="row pb-30 pt-15">
          <div class="col-sm-6">
            <script>document.write(new Date().getFullYear())</script> &copy;, Ecom - HTML Ecommerce Template .
          </div>
          <div class="col-sm-6">
            <div class="text-sm-end">All rights reserved</div>
          </div>
        </div>
      </footer>
    </main>
    <script src="{{ asset('dash/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('dash/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dash/assets/js/vendors/select2.min.js') }}"></script>
    <script src="{{ asset('dash/assets/js/vendors/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('dash/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <script src="{{ asset('dash/assets/js/vendors/chart.js') }}"></script>
    <script src="{{ asset('dash/assets/js/main.js?v=1.0.0') }}"></script>
    <script src="{{ asset('dash/assets/js/custom-chart.js') }}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      (function () {
        if (typeof Swal === 'undefined') return;

        window.SwalToast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2500,
          timerProgressBar: true,
          showClass: { popup: 'swal2-show' },
          hideClass: { popup: 'swal2-hide' },
          customClass: {
            popup: 'shadow-sm',
          }
        });

        window.SwalConfirm = Swal.mixin({
          buttonsStyling: false,
          reverseButtons: true,
          customClass: {
            confirmButton: 'btn btn-sm btn-primary',
            cancelButton: 'btn btn-sm btn-light',
            actions: 'gap-2',
          }
        });
      })();
    </script>
    @if(session('success') || session('error'))
      <script>
        (function () {
          const success = @json(session('success'));
          const error = @json(session('error'));
          if (success) {
            (window.SwalToast || Swal).fire({
              icon: 'success',
              title: success,
            });
            return;
          }
          if (error) {
            (window.SwalToast || Swal).fire({
              icon: 'error',
              title: error,
            });
          }
        })();
      </script>
    @endif
    @livewireScripts
  </body>
</html>