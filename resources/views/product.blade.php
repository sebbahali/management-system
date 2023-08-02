@extends('dashboard')
 @section('css')
<!--  BEGIN CUSTOM STYLE FILE  -->
<link rel="stylesheet" type="text/css" href="../src/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" type="text/css" href="../src/glightbox.min.css">
    <link rel="stylesheet" type="text/css" href="../src/splide.min.css">

    <link rel="stylesheet" type="text/css" href="../src/tabs.css">
    <link rel="stylesheet" type="text/css" href="../src/ecommerce-details1.css">
    
    <link rel="stylesheet" type="text/css" href="../src/tabs1.css">
    <link rel="stylesheet" type="text/css" href="../src/ecommerce-details.css">
    <!--  END CUSTOM STYLE FILE  -->
    <style>
        /* Styling for the product details container */
/* Styling for the product details container */
.product-details {
  display: flex;
  flex-wrap: wrap;
}

/* Styling for product description and shipping method */
.product-description, .shipping-method, .second-description {
  flex-basis: 45%;
  padding: 10px;
  border: 1px solid #ccc;
  margin: 10px;
  cursor: pointer; /* Add cursor pointer to indicate clickable */
}

/* Styling for the second description */
.second-description {
  width: 100%;
  margin-top: 20px;
}

/* Hide the description content by default */
.description-content, .shipping-content, .description2-content {
  display: none;
}

.table-container {
  max-width: 300px; /* Adjust the width as needed */
  margin: 20px auto;
}

.description-table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
  text-align: center;
}

.description-table th,
.description-table td {
  padding: 10px;
  border: 1px solid #ccc;
}

.description-table th {
  background-color: #f2f2f2;
}

.description-table tr:hover {
  background-color: #f9f9f9;
}

        </style>
 @endsection
 @section('contant')




   <!--  BEGIN CONTENT AREA  -->
   <div id="content" class="main-content">

<div class="layout-px-spacing">

    <div class="middle-content container-xxl p-0">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">المنتج</a></li>
                    <li class="breadcrumb-item active" aria-current="page">تفاصيل</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-top-spacing">

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">

                <div class="widget-content widget-content-area br-8">

                    <div class="row justify-content-center">
                        <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-7 col-sm-9 col-12 pe-3">
                            <!-- Swiper -->
                            <div id="main-slider" class="splide">
                                <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide">
                                                <a href="ecommerce-1.jpg" class="glightbox">
                                                    <img alt="ecommerce" src="ecommerce-1.jpg">
                                                </a>
                                            </li>
                                            <li class="splide__slide">
                                                <a href="ecommerce-2.jpg" class="glightbox">
                                                    <img alt="ecommerce" src="ecommerce-2.jpg">
                                                </a>
                                            </li>
                                            <li class="splide__slide">
                                                <a href="ecommerce-4.jpg" class="glightbox">
                                                    <img alt="ecommerce" src="ecommerce-4.jpg">
                                                </a>
                                            </li>
                                            <li class="splide__slide">
                                                <a href="ecommerce-5.jpg" class="glightbox">
                                                    <img alt="ecommerce" src="ecommerce-5.jpg">
                                                </a>
                                            </li>
                                            <li class="splide__slide">
                                                <a href="ecommerce-6.jpg" class="glightbox">
                                                    <img alt="ecommerce" src="ecommerce-6.jpg">
                                                </a>
                                            </li>
                                        </ul>
                                </div>
                                </div>

                                <div id="thumbnail-slider" class="splide">
                                <div class="splide__track">
                                        <ul class="splide__list">
                                            <li class="splide__slide"><img alt="ecommerce" src="ecommerce-1.jpg"></li>
                                            <li class="splide__slide"><img alt="ecommerce" src="ecommerce-2.jpg"></li>
                                            <li class="splide__slide"><img alt="ecommerce" src="ecommerce-4.jpg"></li>
                                            <li class="splide__slide"><img alt="ecommerce" src="ecommerce-5.jpg"></li>
                                            <li class="splide__slide"><img alt="ecommerce" src="ecommerce-6.jpg"></li>
                                        </ul>
                                </div>
                                </div>

                        </div>

                        <div class="col-xxl-4 col-xl-5 col-lg-12 col-md-12 col-12 mt-xl-0 mt-5 align-self-center">

                            <div class="product-details-content">
                                
                                <span class="badge badge-light-danger mb-3">40% Sale off</span>
                                
                                <h3 class="product-title mb-0">Cotton T-Shit</h3>
                                
                                <div class="review mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                    <span class="rating-score">4.88 <span class="rating-count">(200 Reviews)</span></span>
                                </div>

                                <div class="row">

                                    <div class="col-md-9 col-sm-9 col-9">

                                        <div class="pricing">

                                            <span class="discounted-price">$20</span>
                                            <span class="regular-price">$30</span>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-3 text-end">
                                        <div class="product-share">
                                            <button class="btn btn-light-success btn-icon btn-rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                </div>                                            

                                <hr class="mb-4">
                                
                                <div class="row color-swatch mb-4">
                                    <div class="col-xl-3 col-lg-6 col-sm-6 align-self-center">اللون</div>
                                    <div class="col-xl-9 col-lg-6 col-sm-6">
                                        <div class="color-options text-xl-end">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4" checked>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row size-selector mb-4">
                                    <div class="col-xl-9 col-lg-6 col-sm-6 align-self-center">القياس</div>
                                    <div class="col-xl-3 col-lg-6 col-sm-6 align-self-center">
                                        <select class="form-select form-control-sm" aria-label="Default select example">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L" selected>L</option>
                                            <option value="XL">XL</option>
                                            <option value="2XL">2XL</option>
                                        </select>
                                        <a href="javascript:void(0);" class="product-helpers text-end d-block mt-2">Size Chart</a>
                                    </div>
                                </div>

                                <div class="row quantity-selector mb-4">
                                    <div class="col-xl-6 col-lg-6 col-sm-6 mt-sm-3">الكمية</div>
                                    <div class="col-xl-6 col-lg-6 col-sm-6">
                                        <input id="demo1" type="text" value="1" name="demo1">
                                        <p class="text-danger product-helpers text-end mt-2">Low Stock</p>
                                    </div>
                                </div>

                                <hr class="mb-5 mt-4">

                                <div class="action-button text-center">

                                    <div class="row">

                                        <div class="col-xxl-7 col-xl-7 col-sm-6 mb-sm-0 mb-3">
                                            <button class="btn btn-primary w-100 btn-lg"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> <span class="btn-text-inner">إضافة إلى المفضلة</span></button>
                                        </div>

                                        <div class="col-xxl-5 col-xl-5 col-sm-6">
                                            <button class="btn btn-success w-100 btn-lg">أطلب الأن</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="secure-info mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                                    <p>مدفوعات آمنة ومضمونة. عوائد سهلة.</p>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">

                <div class="widget-content widget-content-area br-8">

                    <div class="production-descriptions simple-pills">

                        <div class="pro-des-content">

                            <div class="row">
                                <div class="col-xxl-6 col-xl-8 col-lg-9 col-md-9 col-sm-12 mx-auto">
                                    <div class="product-reviews mb-5">
                                            
                                        <div class="row">
                                            <div class="col-sm-6 align-self-center">
                                                <div class="reviews">
                                                    <h1 class="mb-0">4.88</h1>
                                                    <span>(200 المراجعات)</span>
                                                    <div class="stars mt-3 mb-sm-0 mb-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star empty-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
    
                                                <div class="row review-progress mb-sm-1 mb-3">
                                                    <div class="col-sm-4">
                                                        <p>5 Star</p>
                                                    </div>
                                                    <div class="col-sm-8 align-self-center">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row review-progress mb-sm-1 mb-3">
                                                    <div class="col-sm-4">
                                                        <p>4 Star</p>
                                                    </div>
                                                    <div class="col-sm-8 align-self-center">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row review-progress mb-sm-1 mb-3">
                                                    <div class="col-sm-4">
                                                        <p>3 Star</p>
                                                    </div>
                                                    <div class="col-sm-8 align-self-center">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row review-progress mb-sm-1 mb-3">
                                                    <div class="col-sm-4">
                                                        <p>2 Star</p>
                                                    </div>
                                                    <div class="col-sm-8 align-self-center">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row review-progress mb-sm-1 mb-3">
                                                    <div class="col-sm-4">
                                                        <p>1 Star</p>
                                                    </div>
                                                    <div class="col-sm-8 align-self-center">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            
                            
                            <div id="iconsAccordion" class="accordion-icons accordion">

                            <div class="product-details">
  <div class="product-description">
    <h2 class="toggle-description">مخزون</h2>
    <div class="description-content">
  <table class="description-table">
    <thead>
      <tr>
        <th>Size</th>
        <th>Stroke</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Small</td>
        <td>1px</td>
      </tr>
      <tr>
        <td>Medium</td>
        <td>2px</td>
      </tr>
      <tr>
        <td>Large</td>
        <td>3px</td>
      </tr>
    </tbody>
  </table>
</div>
  </div>
  <div class="shipping-method">
    <h2 class="toggle-shipping">وصف المنتج</h2>
    <p class="shipping-content">Standard Shipping: 3-5 business days<br>
      Express Shipping: 1-2 business days<br>
      International Shipping: 7-10 business days
    </p>
  </div>
</div>
<div class="second-description">
  <h2 class="toggle-description2">وصف الإعلاني</h2>
  <p class="description2-content">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>


                                 

                            </div>
                        </div>
                    </div>

                </div>
                
            </div>

        </div>

    </div>

</div>









 @endsection
@section('js')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../src/jquery.bootstrap-touchspin.min.js"></script>
    <script src="../src/glightbox.min.js"></script>
    <script src="../src/splide.min.js"></script>
    <script src="../src/ecommerce-details.js"></script>    
    <script>
  // Function to toggle visibility of description
  function toggleDescription() {
    const descriptionContent = document.querySelector('.description-content');
    descriptionContent.style.display = (descriptionContent.style.display === 'none') ? 'block' : 'none';
  }

  // Function to toggle visibility of shipping method
  function toggleShipping() {
    const shippingContent = document.querySelector('.shipping-content');
    shippingContent.style.display = (shippingContent.style.display === 'none') ? 'block' : 'none';
  }

  // Function to toggle visibility of second description
  function toggleDescription2() {
    const description2Content = document.querySelector('.description2-content');
    description2Content.style.display = (description2Content.style.display === 'none') ? 'block' : 'none';
  }

  // Add event listeners to the title elements
  document.querySelector('.toggle-description').addEventListener('click', toggleDescription);
  document.querySelector('.toggle-shipping').addEventListener('click', toggleShipping);
  document.querySelector('.toggle-description2').addEventListener('click', toggleDescription2);
</script>

@endsection