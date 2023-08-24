<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Ayamkoe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav container-fluid">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('halamanUtama') }}">Homepage</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ url('produk') }}">Produk</a>
                </li>

                @can('isUser')

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('user') }}">Akun</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ url('pembayaran') }}">Pesanan</a>
                    </li>
                @endcan

                @can('isKaryawan')
                    <li class="nav-item ms-auto me-2">
                        <a class="nav-link">{{ auth()->user()->name ?? 'default name' }}</a>
                    </li>
                @else
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="{{ route('pembayaran.indexPelanggan') }}">Pesananku</a>
                    </li>

                    <li class="nav-item me-2">
                        <a class="nav-link">{{ auth()->user()->name ?? 'default name' }}</a>
                    </li>
                @endcan

                <li class="nav-item">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Logout
                    </button>
                </li>
            </ul>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Logout</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah anda yakin logout?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
