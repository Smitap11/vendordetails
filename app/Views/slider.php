<div class="container">
  <!-- Carousel slider wrapped inside a custom container with border and shadow -->
  <div class="slider-container my-4">
    <div id="myCarousel" class="carousel slide">
      <!-- Carousel items with forms -->
      <div class="carousel-inner" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);background:#f2f4f8;">

        <!-- First form slide -->
        <?= $this->include("/business_details"); ?>
        
        <!-- Second form slide -->
        <?= $this->include("/contact_information"); ?>


        <!-- Third form slide -->
        <?= $this->include("/shipping_information"); ?>

        <!-- Fourth form slide -->
        <?= $this->include("/vendor_finance"); ?>

        <!-- Vendor settings fifth slide -->
        <?= $this->include("/vendor_setting"); ?>
        
        <!-- Company RMA Information Seventh form slide -->
        <?= $this->include("/company_rma_info"); ?>

        <!-- Finanace/Payment Information Eighth form slide -->
        <?= $this->include("/finance_payment_info");  ?>
        
        <!-- Finanace/Payment Information Eighth form slide -->
        <?= $this->include("/order_processing_info");  ?>


          <!-- Sixth form slide -->
          <div class="carousel-item">
            <div class="form-container">
              <h5>Other Details</h5>
              <form>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <label for="Modified On" class="form-label">Record added On</label>
                    <input type="date" class="form-control" id="record-added-on">
                  </div>

                  <div class="col-md-6">
                    <label for="Modified By" class="form-label">Record added By</label>
                    <input type="type" class="form-control" id="record-added-by">
                  </div>
                </div>
                <button type="submit" class="btn gradient-custom">Save</button>

              </form>
            </div>
        </div>

      </div>
    </div>

    <!-- Button Container Below the Slider -->
    <div class="button-container">
      <button class="custom-control custom-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" id="prevButton">
        Previous
      </button>
      <button class="custom-control custom-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next" id="nextButton">
        Next
      </button>
    </div>
  </div>
</div>