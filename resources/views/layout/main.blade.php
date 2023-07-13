<html lang="en">

<head>

    @include('layout.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('layout.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>

                <div class="container-fluid">

                    @yield('crear')

                </div>

                <div class="container-fluid">

                    @yield('editar')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>


        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    @include('layout.footer')
    @include('layout.js')

</body>

</html>
