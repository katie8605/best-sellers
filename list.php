<div class="container">
    <div class="row height d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form id ="search" method="post" class="form"> 
                <i class="fas fa-calendar-day"></i>
                <input type="text" class="form-control form-input date-input <?php echo $data['error']; ?>" name="date" id="datepicker" placeholder="Select a published date..." value="<?php echo $data['input']; ?>">
                <div id="validationServerUsernameFeedback" class="invalid-feedback">
                    The date format is invalid.
                </div>
                <span class="left-pan"><a id="date-btn"><i class="fas fa-arrow-right"></i></a></span> 
            </form>
        </div>
    </div>
</div>

<div class="row section-width mx-auto my-3">
    <span class="fw-bold text-end darker-blue-font">
        Displaying lists for <?php echo $data['date']; ?> (Updated Weekly)
    </span>
</div>

<?php
$books = $data['books'];
$total = count($books);
if ($total > 0) { ?>
    <div class="row row-cols-4 g-4 section-width mx-auto">
    <?php foreach ($books as $book) { ?>
        <div class="col">   
            <div class="card border-0 bg-transparent" style="height:420px;">
                <div class="front rounded-3 book-image" style="background-image:url('<?php echo $book->book_image ?>');"></div>
                <div class="card-body back text-center rounded-3 opacity-90 overflow-hidden bg-light shadow">
                    <small>
                        <span class="text-uppercase fw-light fs-6 light-blue-font">Rank</span>
                        <span><?php echo $book->rank; ?>&nbsp;&nbsp;|&nbsp;&nbsp;</span>
                        <small><?php echo $api->calculateRankDifference($book->rank, $book->rank_last_week); ?></small>
                    </small>
                    <br />
                    <small><?php echo $book->weeks_on_list; ?> weeks on the list</small>
                    <hr />
                    <h4 class="card-title font-weight-light">
                        <a class="link-dark highlight-link fw-bold fs-5 text-decoration-none" target="_blank" href="<?php echo $book->amazon_product_url; ?>"><?php echo $book->title ?></a> 
                        <span style="font-size:0.8rem;"><i class="fas fa-external-link-alt fa-sm"></i></span>
                    </h4>
                    <p class="card-text fw-bold">
                        <span class="text-uppercase fw-light fs-6 light-blue-font">Author</span>
                        <?php echo $book->author; ?>
                    </p>
                    <small><?php echo $book->description; ?></small>
                    <br />
                    <br />
                    <small>
                        <span class="text-uppercase fw-light fs-6 light-blue-font">ISBN 13</span>
                        <?php echo $book->primary_isbn13; ?>
                    </small>
                    <br />
                    <small>
                        <span class="text-uppercase fw-light fs-6 light-blue-font">ISBN 10</span>
                        <?php echo $book->primary_isbn10; ?>
                    </small>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
<?php } else {
    echo '<p class="fw-bold darker-blue-font text-center"><i>No results found.</i></p>';
} ?>




   