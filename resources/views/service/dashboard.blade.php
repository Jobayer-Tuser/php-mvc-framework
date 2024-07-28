@extends('layouts.app')
@section('content')
    <h1 class="page-header mb-3">
        Hi, Sean. <small>here's what's happening with your store today.</small>
    </h1>

    <div class="row">
        <div class="col-xl-6 mb-3">
            <div class="card text-white text-opacity-70 h-100 overflow-hidden">
                <div class="card-img-overlay d-block d-lg-none bg-blue rounded"></div>
                <div class="card-img-overlay d-none d-md-block bg-blue rounded mb-n1 mx-n1" style="background-image: url(assets/img/bg/wave-bg.png); background-position: right bottom; background-repeat: no-repeat; background-size: 100%;"></div>
                <div class="card-img-overlay d-none d-md-block bottom-0 top-auto">
                    <div class="row">
                        <div class="col-md-8 col-xl-6"></div>
                        <div class="col-md-4 col-xl-6 mb-n2">
                            <img src="assets/img/page/dashboard.svg" alt="" class="d-block ms-n3 mb-5" style="max-height: 310px" />
                        </div>
                    </div>
                </div>

                <div class="card-body position-relative">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="d-flex">
                                <div class="me-auto">
                                    <h5 class="text-white text-opacity-80 mb-3">Weekly Earning</h5>
                                    <h3 class="text-white mt-n1 mb-1">$2,999.80</h3>
                                    <p class="mb-1 text-white text-opacity-60 text-truncate">
                                        <i class="fa fa-caret-up"></i> <b>32%</b> increase compare to last week
                                    </p>
                                </div>
                            </div>
                            <hr class="bg-white bg-opacity-75 mt-3 mb-3" />

                            <div class="row">
                                <div class="col-6 col-lg-5">
                                    <div class="mt-1">
                                        <i class="fa fa-fw fa-shopping-bag fs-28px text-black text-opacity-50"></i>
                                    </div>
                                    <div class="mt-1">
                                        <div>Store Sales</div>
                                        <div class="fw-600 text-white">$1,629.80</div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-5">
                                    <div class="mt-1">
                                        <i class="fa fa-fw fa-retweet fs-28px text-black text-opacity-50"></i>
                                    </div>
                                    <div class="mt-1">
                                        <div>Referral Sales</div>
                                        <div class="fw-600 text-white">$700.00</div>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-white bg-opacity-75 mt-3 mb-3" />
                            <div class="mt-3 mb-2">
                                <a href="#" class="btn btn-yellow btn-rounded btn-sm ps-5 pe-5 pt-2 pb-2 fs-14px fw-600"><i class="fa fa-wallet me-2 ms-n2"></i> Withdraw money</a>
                            </div>
                            <p class="fs-12px">
                                It usually takes 3-5 business days for transferring the earning to your bank account.
                            </p>
                        </div>


                        <div class="col-md-4 d-none d-md-block" style="min-height: 380px;"></div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-xl-6">

            <div class="row">

                <div class="col-sm-6">

                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-orange" style="min-height: 199px;">

                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/order.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px" />
                        </div>


                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">New Orders</h5>
                            <h3 class="text-white mt-n1">56</h3>
                            <div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
                                <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                            </div>
                            <div class="text-white text-opacity-80 mb-4"><i class="fa fa-caret-up"></i> 16% increase <br />compare to last week</div>
                            <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                        </div>

                    </div>


                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-teal" style="min-height: 199px;">

                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/visitor.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px" />
                        </div>


                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">Page Visitors</h5>
                            <h3 class="text-white mt-n1">60.5k</h3>
                            <div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
                                <div class="progrss-bar progress-bar-striped bg-white" style="width: 50%"></div>
                            </div>
                            <div class="text-white text-opacity-80 mb-4"><i class="fa fa-caret-up"></i> 33% increase <br />compare to last week</div>
                            <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                        </div>

                    </div>

                </div>


                <div class="col-sm-6">

                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-pink" style="min-height: 199px;">

                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/email.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px" />
                        </div>


                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">Unread email</h5>
                            <h3 class="text-white mt-n1">30</h3>
                            <div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
                                <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                            </div>
                            <div class="text-white text-opacity-80 mb-4"><i class="fa fa-caret-down"></i> 5% decrease <br />compare to last week</div>
                            <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                        </div>

                    </div>

                    <div class="card mb-3 overflow-hidden fs-13px border-0 bg-gradient-custom-indigo" style="min-height: 199px;">
                        <div class="card-img-overlay mb-n4 me-n4 d-flex" style="bottom: 0; top: auto;">
                            <img src="assets/img/icon/browser.svg" alt="" class="ms-auto d-block mb-n3" style="max-height: 105px" />
                        </div>

                        <div class="card-body position-relative">
                            <h5 class="text-white text-opacity-80 mb-3 fs-16px">Page Views</h5>
                            <h3 class="text-white mt-n1">320.4k</h3>
                            <div class="progress bg-black bg-opacity-50 mb-2" style="height: 6px">
                                <div class="progrss-bar progress-bar-striped bg-white" style="width: 80%"></div>
                            </div>
                            <div class="text-white text-opacity-80 mb-4"><i class="fa fa-caret-up"></i> 20% increase <br />compare to last week</div>
                            <div><a href="#" class="text-white d-flex align-items-center text-decoration-none">View report <i class="fa fa-chevron-right ms-2 text-white text-opacity-50"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">

        <div class="col-xl-6">

            <div class="row">

                <div class="col-sm-6 mb-3 d-flex flex-column">

                    <div class="card mb-3 flex-1">

                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Total Users</h5>
                                    <div>Store user account registration</div>
                                </div>
                                <a href="#" data-bs-toggle="dropdown" class="text-muted"><i class="fa fa-redo"></i></a>
                            </div>
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1">184,593</h3>
                                    <div class="text-success fw-600 fs-13px">
                                        <i class="fa fa-caret-up"></i> +3.59%
                                    </div>
                                </div>
                                <div class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-user fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Social Media</h5>
                                    <div>Facebook page stats overview</div>
                                </div>
                                <a href="#" data-bs-toggle="dropdown" class="text-muted"><i class="fa fa-redo"></i></a>
                            </div>

                            <div class="row">

                                <div class="col-6 text-center">
                                    <div class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-2 ms-auto me-auto">
                                        <i class="fa fa-thumbs-up fa-lg text-primary"></i>
                                    </div>
                                    <div class="fw-600 text-dark">306.5k</div>
                                    <div class="fs-13px">Likes</div>
                                </div>


                                <div class="col-6 text-center">
                                    <div class="w-50px h-50px bg-primary bg-opacity-20 rounded-circle d-flex align-items-center justify-content-center mb-2 ms-auto me-auto">
                                        <i class="fa fa-comments fa-lg text-primary"></i>
                                    </div>
                                    <div class="fw-600 text-dark">27.5k</div>
                                    <div class="fs-13px">Comments</div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="col-sm-6 mb-3">

                    <div class="card h-100">

                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="flex-grow-1">
                                    <h5 class="mb-1">Web Traffic</h5>
                                    <div class="fs-13px">Traffic source and category</div>
                                </div>
                                <a href="#" data-bs-toggle="dropdown" class="text-muted"><i class="fa fa-redo"></i></a>
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-1">320,958</h3>
                                <div class="text-success fs-13px fw-600">
                                    <i class="fa fa-caret-up"></i> +20.9%
                                </div>
                            </div>
                            <div class="progress mb-4" style="height: 10px;">
                                <div class="progress-bar" style="width: 42.66%"></div>
                                <div class="progress-bar bg-teal" style="width: 36.80%"></div>
                                <div class="progress-bar bg-yellow" style="width: 15.34%"></div>
                                <div class="progress-bar bg-pink" style="width: 9.20%"></div>
                                <div class="progress-bar bg-gray-200" style="width: 5.00%"></div>
                            </div>
                            <div class="fs-13px">
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <i class="fa fa-circle fs-9px fa-fw text-primary me-2"></i> Direct visit
                                    </div>
                                    <div class="fw-600 text-dark">42.66%</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <i class="fa fa-circle fs-9px fa-fw text-teal me-2"></i> Organic Search
                                    </div>
                                    <div class="fw-600 text-dark">36.80%</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <i class="fa fa-circle fs-9px fa-fw text-warning me-2"></i> Referral Website
                                    </div>
                                    <div class="fw-600 text-dark">15.34%</div>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <i class="fa fa-circle fs-9px fa-fw text-danger me-2"></i> Social Networks
                                    </div>
                                    <div class="fw-600 text-dark">9.20%</div>
                                </div>
                                <div class="d-flex align-items-center mb-15px">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <i class="fa fa-circle fs-9px fa-fw text-gray-200 me-2"></i> Others
                                    </div>
                                    <div class="fw-600 text-dark">5.00%</div>
                                </div>
                                <div class="fs-12px text-end">
                                    <span class="fs-10px">powered by </span>
                                    <span class="d-inline-flex fw-600">
<span class="text-primary">G</span>
<span class="text-danger">o</span>
<span class="text-warning">o</span>
<span class="text-primary">g</span>
<span class="text-green">l</span>
<span class="text-danger">e</span>
</span>
                                    <span class="fs-10px">Analytics API</span>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="col-xl-6 mb-3">

            <div class="card h-100">

                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Sales Analytics</h5>
                            <div class="fs-13px">Weekly sales performance chart</div>
                        </div>
                        <a href="#" data-bs-toggle="dropdown" class="text-muted"><i class="fa fa-redo"></i></a>
                    </div>
                    <div id="chart"></div>
                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xl-6 mb-3">

            <div class="card h-100">

                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Bestseller</h5>
                            <div class="fs-13px">Top 3 product sales this week</div>
                        </div>
                        <a href="#" class="text-decoration-none">See All</a>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center me-3 w-50px h-50px">
                            <img src="assets/img/product/product-1.jpg" alt="" class="ms-100 mh-100" />
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-primary fs-10px fw-600">TOP SALES</div>
                                <div class="text-dark fw-600">iPhone 11 Pro Max (256GB)</div>
                                <div class="fs-13px">$1,099</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-dark fw-600">382</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center me-3 w-50px h-50px">
                            <img src="assets/img/product/product-2.jpg" alt="" class="ms-100 mh-100" />
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-dark fw-600">Macbook Pro 13 inch (2021)</div>
                                <div class="fs-13px">$1,120</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-dark fw-600">102</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center me-3 w-50px h-50px">
                            <img src="assets/img/product/product-3.jpg" alt="" class="ms-100 mh-100" />
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-dark fw-600">Apple Watch Series 4(2021)</div>
                                <div class="fs-13px">$349</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-dark fw-600">75</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center mb-3">
                        <div class="d-flex align-items-center justify-content-center me-3 w-50px h-50px">
                            <img src="assets/img/product/product-4.jpg" alt="" class="ms-100 mh-100" />
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-dark fw-600">12.9-inch iPad Pro (256GB)</div>
                                <div class="fs-13px">$1,099</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-dark fw-600">62</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="d-flex align-items-center justify-content-center me-3 w-50px h-50px">
                            <img src="assets/img/product/product-5.jpg" alt="" class="ms-100 mh-100" />
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <div class="text-dark fw-600">iPhone 11 (128gb)</div>
                                <div class="fs-13px">$799</div>
                            </div>
                        </div>
                        <div class="ps-3 text-center">
                            <div class="text-dark fw-600">59</div>
                            <div class="fs-13px">sales</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="col-xl-6 mb-3">

            <div class="card h-100">

                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <div class="flex-grow-1">
                            <h5 class="mb-1">Transaction</h5>
                            <div class="fs-13px">Latest transaction history</div>
                        </div>
                        <a href="#" class="text-decoration-none">See All</a>
                    </div>

                    <div class="table-responsive mb-n2">
                        <table class="table table-borderless mb-0">
                            <thead>
                            <tr class="text-dark">
                                <th class="ps-0">No</th>
                                <th>Order Details</th>
                                <th class="text-center">Status</th>
                                <th class="text-end pe-0">Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="ps-0">1.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-40px h-40px">
                                            <img src="assets/img/icon/paypal2.svg" alt="" class="ms-100 mh-100" />
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="fw-600 text-dark">Macbook Pro 15 inch</div>
                                            <div class="fs-13px">5 minutes ago</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><span class="badge bg-success bg-opacity-20 text-success" style="min-width: 60px;">Success</span></td>
                                <td class="text-end pe-0">$1,699.00</td>
                            </tr>
                            <tr>
                                <td class="ps-0">2.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-40px h-40px rounded">
                                            <img src="assets/img/icon/mastercard.svg" alt="" class="ms-100 mh-100" />
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="fw-600 text-dark">Apple Watch 5 Series</div>
                                            <div class="fs-13px">5 minutes ago</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><span class="badge bg-success bg-opacity-20 text-success" style="min-width: 60px;">Success</span></td>
                                <td class="text-end pe-0">$699.00</td>
                            </tr>
                            <tr>
                                <td class="ps-0">3.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-40px h-40px rounded">
                                            <img src="assets/img/icon/visa.svg" alt="" class="ms-100 mh-100" />
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="fw-600 text-dark">iPhone 11 Pro Max</div>
                                            <div class="fs-13px">12 minutes ago</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><span class="badge bg-warning bg-opacity-20 text-warning" style="min-width: 60px;">Pending</span></td>
                                <td class="text-end pe-0">$1,299.00</td>
                            </tr>
                            <tr>
                                <td class="ps-0">4.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-40px h-40px rounded">
                                            <img src="assets/img/icon/paypal2.svg" alt="" class="ms-100 mh-100" />
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="fw-600 text-dark">Apple Magic Keyboard</div>
                                            <div class="fs-13px">15 minutes ago</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><span class="badge text-dark text-opacity-50 bg-dark bg-opacity-10" style="min-width: 60px;">Cancelled</span></td>
                                <td class="text-end pe-0">$199.00</td>
                            </tr>
                            <tr>
                                <td class="ps-0">5.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="w-40px h-40px rounded">
                                            <img src="assets/img/icon/mastercard.svg" alt="" class="ms-100 mh-100" />
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div class="fw-600 text-dark">iPad Pro 15 inch</div>
                                            <div class="fs-13px">15 minutes ago</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center"><span class="badge bg-success bg-opacity-20 text-success" style="min-width: 60px;">Cancelled</span></td>
                                <td class="text-end pe-0">$1,099.00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection