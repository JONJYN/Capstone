<?php include "header.php"; ?>

<div class="col-lg-10 mx-auto p-4 py-md-5">
    <header class="d-flex align-items-center pb-3 mb-3 border-bottom">
        <a href="/" class="d-flex align-items-center text-body-emphasis text-decoration-none">
            <h1 class="text-body-emphasis">Dashboard Aplikasi Pembayaran SPP</h1>
        </a>
    </header>
    <main>
        <div class="d-flex flex-column justify-content-center py-3 mb-4 container-fluid">
            <div class="mb-5">
                <p class="fs-5 col-md-8">Selamat Datang <?php $sql = mysqli_query($connect, "SELECT * FROM admin ORDER BY idadmin ASC");
                                                        while ($data = mysqli_fetch_array($sql)) {
                                                            echo "$data[namalengkap]";
                                                        } ?>
                </p>
            </div>

            <div class="row g-5">
                <div class="col-md-6">
                    <h2 class="text-body-emphasis">Starter projects</h2>
                    <p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p>
                    <ul class="list-unstyled ps-0">
                        <li>
                            <a class="icon-link mb-1" href="https://github.com/twbs/examples/tree/main/icons-font" rel="noopener" target="_blank">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap npm starter
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="https://github.com/twbs/examples/tree/main/parcel" rel="noopener" target="_blank">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap Parcel starter
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="https://github.com/twbs/examples/tree/main/vite" rel="noopener" target="_blank">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap Vite starter
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="https://github.com/twbs/examples/tree/main/webpack" rel="noopener" target="_blank">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap Webpack starter
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6">
                    <h2 class="text-body-emphasis">Guides</h2>
                    <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
                    <ul class="list-unstyled ps-0">
                        <li>
                            <a class="icon-link mb-1" href="/docs/5.3/getting-started/introduction/">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap quick start guide
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="/docs/5.3/getting-started/webpack/">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap Webpack guide
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="/docs/5.3/getting-started/parcel/">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap Parcel guide
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="/docs/5.3/getting-started/vite/">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Bootstrap Vite guide
                            </a>
                        </li>
                        <li>
                            <a class="icon-link mb-1" href="/docs/5.3/getting-started/contribute/">
                                <svg class="bi" width="16" height="16">
                                    <use xlink:href="#arrow-right-circle" />
                                </svg>
                                Contributing to Bootstrap
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</div>
<?php include "footer.php"; ?>