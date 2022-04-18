<div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-4">
    <a href="javascript:void(0);" class="property_box">
        <div class="pro_box_image1">
            <div class="pro_search_img_fix">
                <img src="{{ $product->image }}" class="img-fluid">
                <div class="property_img_overlay"></div>
            </div>
            <div class="price_share_btn1 px-3 pb-3 d-flex justify-content-between align-items-center">
                <p class="font20 grey_color fw-bold roboto mb-0">${{ $product->price }}</p>                
            </div>
        </div>
        <div class="pro_box_content1">
            <h4 class="roboto_slab font18 medium colorf5f5f5">
                {{ (strlen($product->name) > 28) ? substr($product->name, 0, 28).'..' : $product->name  }}
            </h4>
            <p class="coloraeb4b6 font13 mt-3 mb-3">
                {{ (strlen($product->description) > 45) ? substr($product->description, 0, 45).'..' : $product->description  }}
            </p>
        </div>
    </a>
</div>
