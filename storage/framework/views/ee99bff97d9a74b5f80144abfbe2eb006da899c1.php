
<?php $__env->startSection('title',"Products"); ?>
<?php $__env->startSection('content'); ?>

<?php $__env->startPush('styles'); ?>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('plugin/bootstrap-datepicker/bootstrap-datepicker.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugin/bootstrap-daterangepicker/bootstrap-daterangepicker.css')); ?>" rel="stylesheet">
    <style>
        .datepicker table tr td.selected, .datepicker table tr td.selected:hover, .datepicker table tr td.selected.highlighted{
            color:var(--rosegold_primary);
        }
    </style>
<?php $__env->stopPush(); ?>

    <section class="all_innerpage_title">
        <div class="container">
            <h1 class="font36 colorededed custom_border_b text-center">Products</h1>
        </div>
    </section>
    
    <!-- property search body start -->
    <section class="property_search_section darkgrey-bg py-60">
        <div class="container">
            <div class="d-flex" id="wrapper">
            <?php /*?>    
            @include('property.partial.sidebar')<?php */?>
            <!-- Page content wrapper-->
                <div class="col-12 col-lg-12" id="page-content-wrapper">
                    <!-- Top navigation-->
                    <nav class="navbar navbar-expand-lg navbar-light p-0 m-0">
                        <div class="container-fluid justify-content-center">
                            <button class="sidebar_menu_icon d-block d-lg-none text-center" id="sidebarToggle"><img src="<?php echo e(asset('images/menu-icon.png')); ?>" class="img-fluid"></button>
                        </div>
                    </nav>
                    <!-- Page content-->
                    <div class="search_details_right_content">
                        <div class="row mx-0 w-100">
                            <div class="col-12 col-lg-12">
                                <form class="row mx-0 w-100" name="topForm" id="topForm" method="post" action="<?php echo e(route('user.home')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                        <div class="search_bar_property_details d-flex justify-content-between">
                                            <input type="text" name="search" id="search" placeholder="Enter Author OR Product Name" class="address_search_bar" value="<?php echo e(old('search')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="sort_by_list">
                                            <div class="input-daterange input-group" id="datepicker-range">
                                                <input type="text" class="form-control" name="from_date" id="from_date" value="<?php echo e(old('from_date')); ?>" placeholder="From Date">
                                                <div class="input-group-prepend">
                                                  <span class="input-group-text">to</span>
                                                </div>
                                                <input type="text" class="form-control" name="to_date" id="to_date" value="<?php echo e(old('to_date')); ?>" placeholder="To Date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                        <button type="submit" class="property_search_btn grey_color roboto_slab grey_color font18 medium">Search</button>
                                    </div>
                                </form>                                
                                <div class="row mx-0 w-100 pt-5" id="product_list">
                                    <?php if(count($products)): ?>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('product.partial.list', $product, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php echo $__env->make('product.partial.no-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>                                    
                                </div>
                                <?php if($total>=2): ?>
                                    <div class="row mx-0 w-100 pt-5 pro_view_more_btn">
                                        <input type="hidden" name="page" id="page" value="2">
                                        <a href="javascript:void(0)" class="get_started_btn d-inline-block text-center grey_color medium roboto_slab font18 mx-auto">View More
                                            <span class="ps-2">
                                            <img class="mb-1 hover-icon" src="<?php echo e(asset('images/get_start_btn_arrow.png')); ?>"  alt="" />
                                            <img class="mb-1 default-icon" src="<?php echo e(asset('images/get_start_btn_hover_arrow.png')); ?>" alt="" />
                                        </span>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- property search body end -->
    <?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('plugin/bootstrap-datepicker/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/bootstrap-daterangepicker/bootstrap-daterangepicker.js')); ?>"></script>
    <script>
        let isRtl = $('html').attr('dir') === 'rtl';
        $('#datepicker-range').datepicker({
            clearBtn: true,
            format: "dd/mm/yyyy",
            orientation: isRtl ? 'auto right' : 'auto left'
        });
        $(document).ready(function () {
            $('#page').val('2');
            
            $('.get_started_btn').click(function () {
                let page = $('#page').val();
                let search = $('#search').val();
                let from_date = $('#from_date').val();
                let to_date = $('#to_date').val();
                let url = '<?php echo e(route('user.home')); ?>?page='+page;                
                let param = {search:search,from_date:from_date,to_date:to_date};                
                let res = '';
                $.ajax({
                    type: "GET",
                    url: url,
                    async:false,
                    data: param,
                    success: function(data){
                        res=JSON.parse(data);
                    }
                });
                //var res = ajaxCall(url,param);
                if(!jQuery.isEmptyObject(res.html)){
                    $('#product_list').append(res.html);
                }
                else{
                    $('.pro_view_more_btn').remove();
                }
                if(res.total == 0){
                    $('.pro_view_more_btn').remove();
                }
                else{
                    page = parseInt(page) + 1;
                    $('#page').val(page);
                }
            });
        });        
    </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp64\www\product_management\resources\views/product/search.blade.php ENDPATH**/ ?>